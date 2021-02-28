<?php

namespace App\Repository;

use App\Entity\PublicUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PublicUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method PublicUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method PublicUser[]    findAll()
 * @method PublicUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PublicUser::class);
    }

    // /**
    //  * @return PublicUser[] Returns an array of PublicUser objects
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
    public function findOneBySomeField($value): ?PublicUser
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
