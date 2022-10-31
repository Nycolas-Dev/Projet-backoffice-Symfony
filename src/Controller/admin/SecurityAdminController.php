<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/page_login_alt.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/paneladmin", name="paneladmin")
     */
    public function paneladmin(): Response
    {
        return $this->render('admin/home_admin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
