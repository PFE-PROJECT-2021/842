<?php

namespace App\Repository;

use App\Entity\Cahierdecharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cahierdecharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cahierdecharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cahierdecharge[]    findAll()
 * @method Cahierdecharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CahierdechargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cahierdecharge::class);
    }

    // /**
    //  * @return Cahierdecharge[] Returns an array of Cahierdecharge objects
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
    public function findOneBySomeField($value): ?Cahierdecharge
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
