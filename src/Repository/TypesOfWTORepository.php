<?php

namespace App\Repository;

use App\Entity\TypesOfWTO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypesOfWTO|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypesOfWTO|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypesOfWTO[]    findAll()
 * @method TypesOfWTO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypesOfWTORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypesOfWTO::class);
    }

    // /**
    //  * @return TypesOfWTO[] Returns an array of TypesOfWTO objects
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
    public function findOneBySomeField($value): ?TypesOfWTO
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
