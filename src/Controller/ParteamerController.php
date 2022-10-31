<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Forms_management\CallApiRecruit;
use App\Forms_management\DataForForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use App\Form\CandidatesType;
use App\Form\TestType;

class ParteamerController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/parteamer", name="parteamer")
     */
    public function parteamer(Request $request, CallApiRecruit $callApiRecruit, DataForForm $data): Response
    {
        $success = $request->query->get('success');
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $parteamer = $data->getParteamer($mail);
        $form = $this->createForm(CandidatesType::class, $parteamer);

        //Return un tableau associatif avec les données AVANT validation du formulaire
        $tabActualData = $data->getDataParteamer($user);

        $form->handleRequest($request);
       
        if ($form->isSubmitted()) { // && $form->isValid()
            
            //Return un tableau associatif avec les données APRES validation du formulaire
            $tabNewData = $data->getDataParteamer($user);

            //Différence entre les deux tableaux associatifs
            $dataToModify = array_diff_assoc($tabNewData, $tabActualData);
            
            //Return l'id de l'utilisateur
            $idUser = $data->getIdUser($mail);
            
            //Modification dans Zoho recruit
            $result = $callApiRecruit->updateCandidat($idUser, $dataToModify);


            if(isset($result->error)) {
                $success = false;
                $notif = (string) $result->error->message;
            }
            else {

                $success = true;
                //Gestion BDD
                
                $em = $this->getDoctrine()->getManager(); // On récupère l'entity manager

                $data = $form->getData();

                $em->persist($parteamer); // On confie notre entité à l'entity manager (on persist l'entité)
                // $parteamer->setCandidatepreferences(implode(';',$parteamer->getCandidatepreferences()));
                $em->flush(); // On execute la requete
            }

            return $this->redirectToRoute('parteamer', ['success' => $success]);
        }

        return $this->render('parteamer/parteamer.html.twig', [
            'form' => $form->createView(),
            'success' => $success,
        ]);
    }
}
