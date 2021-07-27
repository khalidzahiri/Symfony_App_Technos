<?php

namespace App\Repository;

use App\Entity\DemandePro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandePro|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandePro|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandePro[]    findAll()
 * @method DemandePro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeProRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandePro::class);
    }

    // /**
    //  * @return DemandePro[] Returns an array of DemandePro objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemandePro
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
