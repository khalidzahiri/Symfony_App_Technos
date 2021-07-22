<?php

namespace App\Repository;

use App\Entity\Outil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Outil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Outil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Outil[]    findAll()
 * @method Outil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Outil::class);
    }

    // /**
    //  * @return Outil[] Returns an array of Outil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Outil
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
