<?php
 
namespace App\Forms_management;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Users;
use App\Entity\Candidates;
use App\Entity\Candidateportfolios;
use App\Entity\Candidateexperiences;
 
class DataForForm
{
    private $client;
 
    public function __construct(HttpClientInterface $client, ParameterBagInterface $params, EntityManagerInterface $em)
    {
        $this->client = $client;
        $this->params = $params;
        $this->em = $em;
    }
 
    public function getDataUser($user)
    {
        $mail = $user->getUserEmail();
        $user = $this->em
            ->getRepository(Users::class)
            ->find($mail);

        
        $tabData = [
            'First Name' => $user->getUserfirstname(),
            'Last Name' => $user->getUserlastname(),
            'Salutation' => $user->getUsersalutation(),
            'Mobile' => $user->getUsermobile(),
            'Phone' => $user->getUsertelephone(),
            'Street' => $user->getUserstreet(),
            'Complement' => $user->getUsercomplement(),
            'City' => $user->getUsercity(),
            'Zip Code' => $user->getuserCp(),
            'State' => $user->getUserstate(),
            'Country' => $user->getUsercountry(),
            'Photo' => $user->getUserphoto(),
        ];

        return $tabData;
    }

    public function getDataParteamer($user)
    {
        $mail = $user->getUserEmail();
        $parteamer = $this->em
            ->getRepository(Candidates::class)
            ->findOneBy([
                'candidateuseremail' => $mail
            ]);

            $test;
            
            // if($parteamer->getCandidatepreferences() != null ) {
            //     dump($parteamer->getCandidatepreferences());
            //     $test = explode(';',$parteamer->getCandidatepreferences());
            //     dd($test);
            // }
            // else {
            //     $test = $parteamer->getCandidatepreferences();
            // }

            
        
        $tabData = [
            'Pitch' => $parteamer->getCandidateresume(),
            'Highest Qualification Held' => $parteamer->getCandidatequalification(),
            'Experience' => $parteamer->getCandidateexperience(),
            'CJM' => $parteamer->getCandidatecjm(),
            'Souhaits de mission' => $parteamer->getCandidatepreferences(),
            'Deplacements quotidiens' => $parteamer->getCandidatedaymove(),
            'Deplacements hebdomadaires' => $parteamer->getCandidateweekmove(),
            'Mobilite hebdomadaire' => $parteamer->getCandidatewmobility(),
            'Fonction' => $parteamer->getCandidatefonction(),
            'Associated Tags' => $parteamer->getCandidatetags(),
            'Expertise' => $parteamer->getCandidateexpertise(),
            'Disponibilite' => $parteamer->getCandidateavailability(),
            //'Souhaits de mission' => $parteamer->getParteamerPreferences(),
        ];

        return $tabData;
    }

    public function getDataPortfolio($idPortfolio)
    {
        $portfolio = $this->em
            ->getRepository(Candidateportfolios::class)
            ->findOneBy([
                'CandidatePortfolioId' => $idPortfolio
            ]);

            $test;

        $dateFrom = \DateTime::createFromFormat('m-Y', $editPortfolio['CandidatePortfolioDurationFrom']);
        $dateTo = \DateTime::createFromFormat('m-Y', $editPortfolio['CandidatePortfolioDurationTo']);
        $dateFromRecruit = $dateFrom->format('Y-m-d');
        $dateToRecruit = $dateTo->format('Y-m-d');
        
        $tabData = [
            'Missions' => $portfolio->getCandidateportfoliomissions(),
            'Societe' => $portfolio->getCandidateportfoliosociete(),
            'Secteur' => $portfolio->getCandidateportfoliosecteur(),
            'Contexte' => $portfolio->getCandidateportfoliocontexte(),
            'Periode_From' => $portfolio->getCandidateportfoliodurationfrom(),
            'Periode_To' => $portfolio->getCandidateportfoliodurationto(),
            'TABULARROWID' => $portfolio->getCandidateportfolioid(),
        ];

        return $tabData;
    }

    public function getIdUser($mail)
    {
        $parteamer = $this->em
        ->getRepository(Candidates::class)
        ->findOneBy([
            'candidateuseremail' => $mail
        ]);

        $idUser = $parteamer->getCandidateid();
        return $idUser;
    }

    public function getParteamer($mail)
    {
        $parteamer = $this->em
        ->getRepository(Candidates::class)
        ->findOneBy([
            'candidateuseremail' => $mail
        ]);

        return $parteamer;
    }

    public function getPortfolios($candidateID)
    {
        $portfolios = $this->em
        ->getRepository(Candidateportfolios::class)
        ->findBy([
            'candidateid' => $candidateID
        ]);

        $tabPortfolios = [];
        $i = 0;

        foreach ($portfolios as $portfolio) {
            $i++;
            array_push($tabPortfolios, $portfolio->getSimpleValues($i));
        }

        return $tabPortfolios;
    }

    public function getPortfolioEntity($portfolioID)
    {
        $portfolios = $this->em
        ->getRepository(Candidateportfolios::class)
        ->findOneBy([
            'candidateportfolioid' => $portfolioID
        ]);

        return $portfolios;
    }

    public function getExperienceEntity($cvID)
    {
        $cv = $this->em
        ->getRepository(Candidateexperiences::class)
        ->findOneBy([
            'candidateexperienceid' => $cvID
        ]);

        return $cv;
    }

    public function getCvs($candidateID)
    {
        $cvs = $this->em
        ->getRepository(Candidateexperiences::class)
        ->findBy([
            'candidateid' => $candidateID
        ]);

        $tabCvs = [];
        $i = 0;

        foreach ($cvs as $cv) {
            $i++;
            array_push($tabCvs, $cv->getSimpleValues($i));
        }

        return $tabCvs;
    }
}