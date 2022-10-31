<?php

namespace App\Repository;

use App\Entity\Jobopenings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jobopenings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jobopenings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jobopenings[]    findAll()
 * @method Jobopenings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobopeningsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jobopenings::class);
    }

    // /**
    //  * @return Jobopenings[] Returns an array of Jobopenings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jobopenings
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
