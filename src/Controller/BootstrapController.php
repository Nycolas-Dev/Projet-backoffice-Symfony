<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Candidates;
use App\Form\UsersType;
use App\Form\CandidatesType;
use App\Form\TestType;
use App\Form\CandidateportfoliosType;
use App\Entity\Candidateportfolios;
use Doctrine\ORM\CandidateportfolioRepository;

use App\Forms_management\CallApiRecruit;
use App\Forms_management\CallApiGeo;
use App\Forms_management\DataForForm;
use Twig\Loader\LoaderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;

class BootstrapController extends AbstractController
{  

    /**
     * @Route("/security", name="security")
     */
    public function security(Request $request, CallApiRecruit $callApiRecruit, DataForForm $data): Response
    {
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $parteamer = $data->getParteamer($mail);
        
        $formTest = $this->createForm(TestType::class, $parteamer);
        $image = $user->getUserphoto();

        $online = true;
        $date = "26/12/2020";

        $tabActualData = $data->getDataUser($user);

        $weekDispo = $parteamer->getCandidateavailability();

        $formTest->handleRequest($request);
        if ($formTest->isSubmitted() && $formTest->isValid()) {
            
            //Return un tableau associatif avec les données APRES validation du formulaire
            $tabNewData = $data->getDataParteamer($user);

            //Différence entre les deux tableaux associatifs
            $dataToModify = array_diff_assoc($tabNewData, $tabActualData);

            //dd($dataToModify);

            //Return l'id de l'utilisateur
            $idUser = $data->getIdUser($mail);

            $success = true;
            //Gestion BDD
            $em = $this->getDoctrine()->getManager(); // On récupère l'entity manager

            
            $em->persist($parteamer); // On confie notre entité à l'entity manager (on persist l'entité)
            $em->flush(); // On execute la requete
            //dd($parteamer->getParteamerAvailability());

            return $this->redirectToRoute('security');
        }

        return $this->render('prod/security.html.twig', [
            'controller_name' => 'BootstrapController',
            'name' => $user->getUserLastname(),
            'surname' => $user->getUserFirstname(),
            'mail' => $user->getUserEmail(),
            'online' => $online,
            'date' => $date,
            'user' => $user,
            'formTest' => $formTest->createView(),
            'weekDispo' => $weekDispo,
            'image' => $image,
        ]);
    }

    /** 
     * @Route("/ajax", name="ajax") 
    */ 
    public function ajax(Request $request, CallApiGeo $callApiGeo) {  


        //$test = $request->query->get('test');

        $result = $callApiGeo->callAPI();
        

        return new Response($result);

        //return $this->render('profil',array('data'=>  $request->request->get('request')));

    }     

}
