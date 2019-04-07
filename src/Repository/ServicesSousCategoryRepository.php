<?php

namespace App\Repository;

use App\Entity\ServicesSousCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServicesSousCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesSousCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesSousCategory[]    findAll()
 * @method ServicesSousCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesSousCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServicesSousCategory::class);
    }

    // /**
    //  * @return ServicesSousCategory[] Returns an array of ServicesSousCategory objects
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
    public function findOneBySomeField($value): ?ServicesSousCategory
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
