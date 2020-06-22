<?php

namespace App\Repository;

use App\Entity\CategoryDelivery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryDelivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryDelivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryDelivery[]    findAll()
 * @method CategoryDelivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryDeliveryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryDelivery::class);
    }

    // /**
    //  * @return CategoryDelivery[] Returns an array of CategoryDelivery objects
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
    public function findOneBySomeField($value): ?CategoryDelivery
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
