<?php

namespace App\Repository;

use App\Entity\CategorieTips;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieTips|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieTips|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieTips[]    findAll()
 * @method CategorieTips[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieTipsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieTips::class);
    }

    // /**
    //  * @return CategorieTips[] Returns an array of CategorieTips objects
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
    public function findOneBySomeField($value): ?CategorieTips
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
