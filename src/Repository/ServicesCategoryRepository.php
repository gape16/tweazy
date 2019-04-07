<?php

namespace App\Repository;

use App\Entity\ServicesCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServicesCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesCategory[]    findAll()
 * @method ServicesCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServicesCategory::class);
    }

    // /**
    //  * @return ServicesCategory[] Returns an array of ServicesCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServicesCategory
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
