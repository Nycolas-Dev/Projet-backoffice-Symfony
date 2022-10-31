<?php

namespace App\Repository;

use App\Entity\Candidateexperiences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidateexperiences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidateexperiences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidateexperiences[]    findAll()
 * @method Candidateexperiences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateexperiencesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidateexperiences::class);
    }

    // /**
    //  * @return Candidateexperiences[] Returns an array of Candidateexperiences objects
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
    public function findOneBySomeField($value): ?Candidateexperiences
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
