<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('log/page_login.html.twig', [
            'controller_name' => 'BootstrapController',
        ]);
    }

    /**
     * @Route("/check_user", name="check_user")
     */
    public function check_user(): Response
    {
        if($this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('home');
        }
        else {
            return $this->redirectToRoute('error');
        }
    }

    /**
     * @Route("/", name="welcome")
     */
    public function welcome()
    {
        if($this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('home');
        }
        else {
            return $this->redirectToRoute('login');
        }
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        
    }

    /**
     * @Route("/error", name="error")
     */
    public function error(): Response
    {
        return $this->render('log/page_error_login.html.twig', [
            'controller_name' => 'BootstrapController',
        ]);
    }

}
