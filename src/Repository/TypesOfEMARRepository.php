<?php

namespace App\Repository;

use App\Entity\TypesOfEMAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesOfEMAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesOfEMAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesOfEMAR[]    findAll()
 * @method TypesOfEMAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesOfEMARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesOfEMAR::class);
    }

    // /**
    //  * @return TypesOfEMAR[] Returns an array of TypesOfEMAR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypesOfEMAR
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
