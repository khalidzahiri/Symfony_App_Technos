<?php

namespace App\Repository;

use App\Entity\Tutoriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tutoriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tutoriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tutoriel[]    findAll()
 * @method Tutoriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TutorielRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tutoriel::class);
    }

    // /**
    //  * @return Tutoriel[] Returns an array of Tutoriel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tutoriel
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
