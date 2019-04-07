<?php

namespace App\Repository;

use App\Entity\ElementValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ElementValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementValue[]    findAll()
 * @method ElementValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementValueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ElementValue::class);
    }

    // /**
    //  * @return ElementValue[] Returns an array of ElementValue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElementValue
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
