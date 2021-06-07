<?php

namespace App\Repository;

use App\Entity\WorkComplexityFactors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkComplexityFactors|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkComplexityFactors|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkComplexityFactors[]    findAll()
 * @method WorkComplexityFactors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkComplexityFactorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkComplexityFactors::class);
    }

    // /**
    //  * @return WorkComplexityFactors[] Returns an array of WorkComplexityFactors objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WorkComplexityFactors
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
