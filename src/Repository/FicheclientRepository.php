<?php

namespace App\Repository;

use App\Entity\Ficheclient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ficheclient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ficheclient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ficheclient[]    findAll()
 * @method Ficheclient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheclientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ficheclient::class);
    }

    // /**
    //  * @return Ficheclient[] Returns an array of Ficheclient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ficheclient
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
