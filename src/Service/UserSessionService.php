<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use App\Repository\UtilisateurRepository;

class UserSessionService
{
    private $requestStack;
    private $utilisateurRepository;

    public function __construct(RequestStack $requestStack, UtilisateurRepository $utilisateurRepository)
    {
        $this->requestStack = $requestStack;
        $this->utilisateurRepository = $utilisateurRepository;
    }

    public function getUser()
    {
        $session = $this->requestStack->getSession();
        $userData = $session->get('user');
        
        if (!$userData) {
            return null;
        }
        
        // Si on a un ID, on récupère l'utilisateur complet
        if (isset($userData['id'])) {
            return $this->utilisateurRepository->find($userData['id']);
        }
        
        // Pour les admins sans ID en base
        return $userData;
    }
    
    public function isLoggedIn()
    {
        $session = $this->requestStack->getSession();
        return $session->has('user');
    }
    
    public function isAdmin()
    {
        $session = $this->requestStack->getSession();
        $userData = $session->get('user');
        
        return $userData && isset($userData['isAdmin']) && $userData['isAdmin'] === true;
    }
}