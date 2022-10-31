<?php

namespace App\Repository;

use App\Entity\Candidateattachments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidateattachments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidateattachments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidateattachments[]    findAll()
 * @method Candidateattachments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidateattachmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidateattachments::class);
    }

    // /**
    //  * @return Candidateattachments[] Returns an array of Candidateattachments objects
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
    public function findOneBySomeField($value): ?Candidateattachments
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
