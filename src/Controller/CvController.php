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
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Candidateexperiences;

class CvController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/cv", name="cv")
     */
    public function cv(Request $request, CallApiRecruit $callApiRecruit, DataForForm $data, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $parteamer = $data->getParteamer($mail);

        $tabActualData = $data->getDataUser($user);

        $candidateId = $parteamer->getCandidateid();
        $cvs = $data->getCvs($candidateId);

        $requestPost = $request->request->all();

        if($requestPost != null && !array_key_exists('dispo', $requestPost)){
            return $this->redirectToRoute('editvalidatecv', ['info' => $request->request->all()]);
        }

        // dd($request);

        return $this->render('cv/cv.html.twig', [
            'user' => $user,
            'cvs' => $cvs,
        ]);
    }

    public function cvDeleteView(): Response
    {

        return $this->render('cv/cv_delete.html.twig', [
        ]);

    }

    /**
     * @Route("/delete/cv/{id}", name="cvdelete")
     */
    public function delete(CallApiRecruit $callApiRecruit, Candidateexperiences $id = null): Response
    {

        if($id != null) {

            $idUser = $id->getCandidateId();
            $idCv = $id->getCandidateexperienceid();
    
            $result = $callApiRecruit->deleteTabular($idUser, $idCv, 'Experience Details');
    
            if(isset($result->error)) {
                dd($result->error);
            }
            else {

            $em = $this->getDoctrine()->getManager();
            $em->remove($id);
            $em->flush();
            }
        };

        return $this->redirectToRoute('cv');
    }

    /**
     * @Route("/edit/cv/{id}", name="cvedit")
     */
    public function edit(Candidateexperiences $id = null, DataForForm $data, Request $request): Response
    {

        if($id != null) {
            
            $cvEntity = $data->getExperienceEntity($id);
            json_encode($cvEntity);

            return $this->json($cvEntity);
        };



        return new Response('No id');

    }

    /**
     * @Route("/edit/cv/", name="cveditcv")
     */
    public function new(DataForForm $data, Request $request): Response
    {
            
        $cvEntity = new Candidateexperiences;
        json_encode($cvEntity);

        return $this->json($cvEntity);

    }

    /**
     * @Route("/editvalidatecv", name="editvalidatecv")
     */
    public function editvalidate(DataForForm $data,CallApiRecruit $callApiRecruit, Request $request, EntityManagerInterface $em): Response
    {

        $editCv = $request->query->get('info');
        
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $idUser = $data->getIdUser($mail);

        $new;

        if($editCv['CandidateExperienceId'] != null) {
            $cvEntity = $data->getExperienceEntity($editCv['CandidateExperienceId']);
            $new = false;
        }
        else {
            $new = true;
            $cvEntity = new Candidateexperiences();
            $cvEntity->setCandidateid($idUser);
            $editCv['CandidateExperienceId'] = '';
        }

        $dateFrom = \DateTime::createFromFormat('m-Y', $editCv['CandidateExperienceDurationFrom']);
        $dateTo = \DateTime::createFromFormat('m-Y', $editCv['CandidateExperienceDurationTo']);
        $dateFromRecruit = $dateFrom->format('Y-m-d');
        $dateToRecruit = $dateTo->format('Y-m-d');

        $tabData = [
            'Occupation / Title' => $editCv['CandidateExperienceOccupation'],
            'Summary' => $editCv['CandidateExperienceSummary'],
            'Company' => $editCv['CandidateExperienceCompany'],
            'Secteur' => implode('; ', $editCv['CandidateExperienceSecteur']),
            'Work Duration_From' => $editCv['CandidateExperienceDurationFrom'],
            'Work Duration_To' => $editCv['CandidateExperienceDurationTo'],
            'TABULARROWID' => $editCv['CandidateExperienceId'],
        ];

        $result = $callApiRecruit->updateTabular($idUser, $tabData, 'Experience Details');

        if($new === true){
            
            $cvs = $data->getCvs($idUser);
            $idCvs = [];
            $idTabularRecords = [];


            $tabularRecords = $callApiRecruit->getCandidateTabularRecordByID($idUser);

            foreach ($cvs as $cv) {
                array_push($idCvs, $cv['candidateexperienceid']);
            }

            foreach ($tabularRecords['Experience Details'] as $tabularRecord) {
                array_push($idTabularRecords, $tabularRecord['TABULARROWID']);
            }

            $idNewCv = array_diff_assoc($idTabularRecords, $idCvs);


            $cvEntity->setCandidateexperienceid(current($idNewCv));
        }

        if(isset($result->error)) {
            dd($result->error);
        }
        else {

        $cvEntity->setCandidateexperienceoccupation($editCv['CandidateExperienceOccupation']);
        $cvEntity->setCandidateexperiencesummary($editCv['CandidateExperienceSummary']);
        $cvEntity->setCandidateexperiencecompany($editCv['CandidateExperienceCompany']);
        $cvEntity->setCandidateexperiencesecteur(implode('; ', $editCv['CandidateExperienceSecteur']));
        $cvEntity->setCandidateexperiencedurationfrom($dateFrom);
        $cvEntity->setCandidateexperiencedurationto($dateTo);


        $em->persist($cvEntity);
        $em->flush();

        }

        return $this->redirectToRoute('cv');

    }
}
