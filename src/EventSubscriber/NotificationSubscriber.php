<?php

namespace App\EventSubscriber;

use App\Repository\NotificationRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Environment;

class NotificationSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $requestStack;
    private $notificationRepository;
    private $utilisateurRepository;

    public function __construct(
        Environment $twig,
        RequestStack $requestStack,
        NotificationRepository $notificationRepository,
        UtilisateurRepository $utilisateurRepository
    ) {
        $this->twig = $twig;
        $this->requestStack = $requestStack;
        $this->notificationRepository = $notificationRepository;
        $this->utilisateurRepository = $utilisateurRepository;
    }

    public function onKernelController(ControllerEvent $event)
    {
        // Ne pas exécuter pour les requêtes sous-requêtes
        if (!$event->isMainRequest()) {
            return;
        }
    
        $session = $this->requestStack->getSession();
        $userData = $session->get('user');
    
        // Check if $userData is an array and has an 'id' key
        if (is_array($userData) && isset($userData['id'])) {
            $user = $this->utilisateurRepository->find($userData['id']);
            if ($user) {
                $unreadCount = $this->notificationRepository->countUnreadByUser($user);
                $this->twig->addGlobal('unreadNotificationsCount', $unreadCount);
            } else {
                // Optional: Set default value if user is not found
                $this->twig->addGlobal('unreadNotificationsCount', 0);
            }
        } else {
            // Optional: Set default value if no valid user data
            $this->twig->addGlobal('unreadNotificationsCount', 0);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}