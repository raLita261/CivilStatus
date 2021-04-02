<?php

namespace App\Repository;

use App\Entity\OfficeLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OfficeLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method OfficeLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method OfficeLocation[]    findAll()
 * @method OfficeLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfficeLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OfficeLocation::class);
    }

    // /**
    //  * @return OfficeLocation[] Returns an array of OfficeLocation objects
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
    public function findOneBySomeField($value): ?OfficeLocation
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
