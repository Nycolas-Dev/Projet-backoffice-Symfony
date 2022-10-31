<?php

namespace App\Repository;

use App\Entity\Candidateportfolios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidateportfolios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidateportfolios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidateportfolios[]    findAll()
 * @method Candidateportfolios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateportfoliosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidateportfolios::class);
    }

    // /**
    //  * @return Candidateportfolios[] Returns an array of Candidateportfolios objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Candidateportfolios
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
