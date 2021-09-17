<?php

namespace App\Repository;

use App\Entity\Ficheprospect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ficheprospect|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ficheprospect|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ficheprospect[]    findAll()
 * @method Ficheprospect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheprospectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ficheprospect::class);
    }

    // /**
    //  * @return Ficheprospect[] Returns an array of Ficheprospect objects
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
    public function findOneBySomeField($value): ?Ficheprospect
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return int|mixed|string
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function countAllFicheprospect()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->select('COUNT (p.id) as value');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    public function findClientNotIn()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a.* FROM ficheclient a LEFT JOIN ficheprospect b
                on a.id = b.id WHERE b.client_id IS NULL'
            )
            ->getResult();
    }

}
