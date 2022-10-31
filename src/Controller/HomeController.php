<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Forms_management\CallApiRecruit;
use App\Forms_management\DataForForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use App\Repository\CandidatesRepository;

class HomeController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/home", name="home")
     */
    public function home(CandidatesRepository $candidatesRepository): Response
    {

        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $parteamer = $candidatesRepository->findOneBy(['candidateuseremail' => $mail]);

        return $this->render('home/home.html.twig', [
            'user' => $user,
            'parteamer' => $parteamer,
        ]);
    }
}
