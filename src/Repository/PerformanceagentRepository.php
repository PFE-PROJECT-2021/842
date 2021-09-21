<?php

namespace App\Repository;

use App\Entity\Performanceagent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Performanceagent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Performanceagent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Performanceagent[]    findAll()
 * @method Performanceagent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PerformanceagentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Performanceagent::class);
    }

    // /**
    //  * @return Performanceagent[] Returns an array of Performanceagent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Performanceagent
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
