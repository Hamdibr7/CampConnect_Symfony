<?php

namespace App\EventSubscriber;

use App\Service\UserSessionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UserSessionSubscriber implements EventSubscriberInterface
{
    private $userSessionService;
    private $urlGenerator;
    
    // Liste des routes qui nécessitent une authentification
    private $securedRoutes = [
        'app_home',
        'app_utilisateur_show',
        'app_utilisateur_edit',
        'app_utilisateur_delete' 

    ];
    
    // Liste des routes qui nécessitent des droits d'administrateur
    private $adminRoutes = [
        'app_utilisateur_index'
     
      
    ];

    public function __construct(UserSessionService $userSessionService, UrlGeneratorInterface $urlGenerator)
    {
        $this->userSessionService = $userSessionService;
        $this->urlGenerator = $urlGenerator;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 10],
        ];
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();
        $route = $request->attributes->get('_route');

        // Si la route est dans la liste des routes sécurisées
        if (in_array($route, $this->securedRoutes) && !$this->userSessionService->isLoggedIn()) {
            // Rediriger vers la page de connexion
            $event->setResponse(new RedirectResponse($this->urlGenerator->generate('app_login')));
        }
        
        // Si la route est dans la liste des routes admin
        if (in_array($route, $this->adminRoutes) && !$this->userSessionService->isAdmin()) {
            // Rediriger vers la page de connexion ou d'accueil
            $redirectUrl = $this->userSessionService->isLoggedIn() 
                ? $this->urlGenerator->generate('app_home') 
                : $this->urlGenerator->generate('app_login');
            
            $event->setResponse(new RedirectResponse($redirectUrl));
        }
    }
}