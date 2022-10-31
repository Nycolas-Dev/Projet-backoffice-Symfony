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

use App\Form\CandidateportfoliosType;
use App\Entity\Candidateportfolios;
use App\Form\TestType;

class PortfolioController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/portfolio", name="portfolio")
     */
    public function portfolio(Request $request, CallApiRecruit $callApiRecruit, DataForForm $data, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $parteamer = $data->getParteamer($mail);

        $tabActualData = $data->getDataUser($user);

        $candidateId = $parteamer->getCandidateid();
        $portfolios = $data->getPortfolios($candidateId);

        $requestPost = $request->request->all();

        if($requestPost != null && !array_key_exists('dispo', $requestPost)){
            return $this->redirectToRoute('editvalidate', ['info' => $request->request->all()]);
        }

        return $this->render('portfolio/portfolio.html.twig', [
            'user' => $user,
            'portfolios' => $portfolios,
        ]);
    }

    public function portfolioDeleteView(): Response
    {

        return $this->render('portfolio/portfolio_delete.html.twig', [
        ]);

    }

    /**
     * @Route("/delete/{id}", name="portfoliodelete")
     */
    public function delete(CallApiRecruit $callApiRecruit, Candidateportfolios $id = null): Response
    {

        if($id != null) {

            $idUser = $id->getCandidateId();
            $idPortfolio = $id->getCandidateportfolioId();
    
            $result = $callApiRecruit->deleteTabular($idUser, $idPortfolio, 'Portefeuille projet');
    
            if(isset($result->error)) {
                dd($result->error);
            }
            else {

            $em = $this->getDoctrine()->getManager();
            $em->remove($id);
            $em->flush();
            }
        };


        return $this->redirectToRoute('portfolio');
    }

    /**
     * @Route("/edit/{id}", name="portfolioedit")
     */
    public function edit(Candidateportfolios $id = null, DataForForm $data, Request $request): Response
    {

        if($id != null) {
            
            $portfolioEntity = $data->getPortfolioEntity($id);
            json_encode($portfolioEntity);

            return $this->json($portfolioEntity);
        };



        return new Response('No id');

    }

    /**
     * @Route("/edit/", name="portfolioeditnew")
     */
    public function new(DataForForm $data, Request $request): Response
    {
            
        $portfolioEntity = new CandidatePortfolios;
        json_encode($portfolioEntity);

        return $this->json($portfolioEntity);

    }

    /**
     * @Route("/editvalidate", name="editvalidate")
     */
    public function editvalidate(DataForForm $data,CallApiRecruit $callApiRecruit, Request $request, EntityManagerInterface $em): Response
    {

        $editPortfolio = $request->query->get('info');
        
        $user = $this->getUser();
        $mail = $user->getUserEmail();
        $idUser = $data->getIdUser($mail);

        $new;

        if($editPortfolio['CandidatePortfolioId'] != null) {
            $portfolioEntity = $data->getPortfolioEntity($editPortfolio['CandidatePortfolioId']);
            $new = false;
        }
        else {
            $new = true;
            $portfolioEntity = new Candidateportfolios();
            // $portfolioEntity->setCandidateportfolioid('12741000003898648');
            $portfolioEntity->setCandidateid($idUser);
            $editPortfolio['CandidatePortfolioId'] = '';
        }

        $dateFrom = \DateTime::createFromFormat('m-Y', $editPortfolio['CandidatePortfolioDurationFrom']);
        $dateTo = \DateTime::createFromFormat('m-Y', $editPortfolio['CandidatePortfolioDurationTo']);
        $dateFromRecruit = $dateFrom->format('Y-m-d');
        $dateToRecruit = $dateTo->format('Y-m-d');

        $tabData = [
            'Missions' => $editPortfolio['CandidatePortfolioMissions'],
            'Societe' => $editPortfolio['CandidatePortfolioSociete'],
            'Secteur' => implode('; ', $editPortfolio['CandidatePortfolioSecteur']),
            'Contexte' => implode('; ', $editPortfolio['CandidatePortfolioContexte']),
            'Periode_From' => $editPortfolio['CandidatePortfolioDurationFrom'],
            'Periode_To' => $editPortfolio['CandidatePortfolioDurationTo'],
            'TABULARROWID' => $editPortfolio['CandidatePortfolioId'],
        ];

        $result = $callApiRecruit->updateTabular($idUser, $tabData, 'Portefeuille projet');

        if($new === true){
            
            $portfolios = $data->getPortfolios($idUser);
            $idPortfolios = [];
            $idTabularRecords = [];


            $tabularRecords = $callApiRecruit->getCandidateTabularRecordByID($idUser);

            foreach ($portfolios as $portfolio) {
                array_push($idPortfolios, $portfolio['candidateportfolioid']);
            }

            foreach ($tabularRecords['Portefeuille projet'] as $tabularRecord) {
                array_push($idTabularRecords, $tabularRecord['TABULARROWID']);
            }

            $idNewPortfolio = array_diff_assoc($idTabularRecords, $idPortfolios);


            $portfolioEntity->setCandidateportfolioid(current($idNewPortfolio));
        }

        if(isset($result->error)) {
            dd($result->error);
        }
        else {


        // $portfolioEntity->setCandidateportfoliotitre($editPortfolio['candidateportfoliotitre']);
        $portfolioEntity->setCandidateportfoliomissions($editPortfolio['CandidatePortfolioMissions']);
        $portfolioEntity->setCandidateportfoliosociete($editPortfolio['CandidatePortfolioSociete']);
        $portfolioEntity->setCandidateportfoliosecteur(implode('; ', $editPortfolio['CandidatePortfolioSecteur']));
        $portfolioEntity->setCandidateportfoliocontexte(implode('; ', $editPortfolio['CandidatePortfolioContexte']));
        $portfolioEntity->setCandidateportfoliodurationfrom($dateFrom);
        $portfolioEntity->setCandidateportfoliodurationto($dateTo);


        $em->persist($portfolioEntity);
        $em->flush();

        }

        return $this->redirectToRoute('portfolio');

    }
}
