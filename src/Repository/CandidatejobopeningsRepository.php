<?php

namespace App\Repository;

use App\Entity\Candidatejobopenings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidatejobopenings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidatejobopenings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidatejobopenings[]    findAll()
 * @method Candidatejobopenings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatejobopeningsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidatejobopenings::class);
    }

    // /**
    //  * @return Candidatejobopenings[] Returns an array of Candidatejobopenings objects
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
    public function findOneBySomeField($value): ?Candidatejobopenings
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
