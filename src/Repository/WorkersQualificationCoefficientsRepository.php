<?php

namespace App\Repository;

use App\Entity\WorkersQualificationCoefficients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkersQualificationCoefficients|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkersQualificationCoefficients|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkersQualificationCoefficients[]    findAll()
 * @method WorkersQualificationCoefficients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkersQualificationCoefficientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkersQualificationCoefficients::class);
    }

    // /**
    //  * @return WorkersQualificationCoefficients[] Returns an array of WorkersQualificationCoefficients objects
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
    public function findOneBySomeField($value): ?WorkersQualificationCoefficients
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
