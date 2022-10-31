<?php

namespace App\Repository;

use App\Entity\Candidateeducationals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidateeducationals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidateeducationals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidateeducationals[]    findAll()
 * @method Candidateeducationals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateeducationalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidateeducationals::class);
    }

    // /**
    //  * @return Candidateeducationals[] Returns an array of Candidateeducationals objects
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
    public function findOneBySomeField($value): ?Candidateeducationals
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
