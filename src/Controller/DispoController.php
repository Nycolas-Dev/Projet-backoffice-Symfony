<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Forms_management\DataForForm;
use Doctrine\ORM\EntityManagerInterface;
use App\Forms_management\CallApiRecruit;

use App\Repository\CandidatesRepository;
use App\Form\DispoType;

class DispoController extends AbstractController
{

    public function dispo(DataForForm $data, CandidatesRepository $candidatesRepository): Response
    {
        //Récupération des infos de l'utilisateur en cours
        $user = $this->getUser();

        //Récupération de l'email associé à l'utilisateur
        $mail = $user->getUserEmail();

        //Récupération de l'entité Parteamer
        $parteamer = $candidatesRepository->findOneBy(['candidateuseremail' => $mail]);

        //Récupération de la disponibilité
        $dispo = $parteamer->getCandidateavailability();

        //Définition du paramètre online pour afficher rouge ou vert
        $online = $dispo === 'Non disponible' ? false : true;

        return $this->render('dispo/dispo.html.twig', [

            'online' => $online,
            'user' => $user,
            'weekDispo' => $dispo,
        ]);
    }

    public function modal(DataForForm $data, CandidatesRepository $candidatesRepository, Request $request, EntityManagerInterface $em, CallApiRecruit $callApiRecruit): Response
    {

        //Récupération des infos de l'utilisateur en cours
        $user = $this->getUser();

        //Récupération de l'email associé à l'utilisateur
        $mail = $user->getUserEmail();

        //Récupération de l'entité Parteamer
        $parteamer = $candidatesRepository->findOneBy(['candidateuseremail' => $mail]);

        //Création du formulaire avec l'entité du parteamer
        $formDispo = $this->createForm(DispoType::class, $parteamer);

        //Retourne un tableau associatif avec les données AVANT validation du formulaire
        $tabActualData = $data->getDataParteamer($user);

        //Gestion POST du formulaire
        $formDispo->handleRequest($request);

            if ($formDispo->isSubmitted() && $formDispo->isValid()) {
                
                //Retourne un tableau associatif avec les données APRES validation du formulaire
                $tabNewData = $data->getDataParteamer($user);

                //Différence entre les deux tableaux associatifs
                $dataToModify = array_diff_assoc($tabNewData, $tabActualData);

                //Return l'id de l'utilisateur
                $idUser = $data->getIdUser($mail);

                //modification dans recruit
                $result = $callApiRecruit->updateCandidat($idUser, $dataToModify);

                if(isset($result->error)) {

                    $success = false;
                    $notif = (string) $result->error->message;
                    
                }
                else{

                    $success = true;

                    //Gestion BDD
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($parteamer);
                    $em->flush();

                }

            }

        return $this->render('dispo/modal.html.twig', [
            'formDispo' => $formDispo->createView(),
        ]);
    }

    public function disconnect(DataForForm $data, CandidatesRepository $candidatesRepository): Response
    {
        //Récupération des infos de l'utilisateur en cours
        $user = $this->getUser();

        return $this->render('disconnect/disconnect.html.twig', [

            'user' => $user,
        ]);
    }

}
