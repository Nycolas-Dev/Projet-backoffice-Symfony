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

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

use App\Form\TestType;
use App\Form\UsersType;

class ProfilController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/profil", name="profil")
     */
    public function profil(Request $request, CallApiRecruit $callApiRecruit, DataForForm $data): Response
    {
        $success = $request->query->get('success');
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $form = $this->createForm(UsersType::class, $user);
        $idUser = $data->getIdUser($mail);

        $image = $user->getUserphoto();

        //Return un tableau associatif avec les données AVANT validation du formulaire
        $tabActualData = $data->getDataUser($user);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            //Return un tableau associatif avec les données APRES validation du formulaire
            $tabNewData = $data->getDataUser($user);

            //Différence entre les deux tableaux associatifs
            $dataToModify = array_diff_assoc($tabNewData, $tabActualData);

            //Return l'id de l'utilisateur
            $idUser = $data->getIdUser($mail);

            if($user->getUserPhoto() != null){
                if (array_key_exists('Photo', $dataToModify)) {
                    //dd($dataToModify['Photo']);
                    $file = $form['userphoto']->getData();
                    //$file->move('/var/www/me-test/public/tmp/', $file->getClientOriginalName());
                    $newPath = $callApiRecruit->updatePhoto($idUser, $file);
                };
            }       

            $test = $callApiRecruit->getCandidateRecordByID($idUser);
            unset($tabActualData['Phone'], $tabActualData['Photo']);
            dump($tabActualData);
            dump($test);
            if(array_diff_assoc($tabActualData, $test)){
                $process = new Process(['php', 'cron.php']);
                $process->run();

                // executes after the command finishes
                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }

                $process->getOutput();

                dump($process->getOutput());
            }
            else{
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
                    if($user->getUserPhoto() != null){
                        $user->setUserPhoto(file_get_contents($newPath));
                    }
                    else {
                        $user->setUserPhoto($image);
                    }
                    $em->persist($user); // On confie notre entité à l'entity manager (on persist l'entité)
                    $em->flush(); // On execute la requete
                    //Création d'un nouveau token pour éviter la déconnexion après le changement de rôle
                    $token = new PostAuthenticationGuardToken($user, 'main', $user->getRoles());
                    $this->get('security.token_storage')->setToken($token);  

                }

                return $this->redirectToRoute('profil', ['success' => $success]);
            }
        }

        return $this->render('profil/user.html.twig', [
            'form' => $form->createView(),
            'success' => $success,
        ]);
    }
}
