<?php

namespace App\Repository;

use App\Entity\WorkersSkillLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkersSkillLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkersSkillLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkersSkillLevel[]    findAll()
 * @method WorkersSkillLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkersSkillLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkersSkillLevel::class);
    }

    // /**
    //  * @return WorkersSkillLevel[] Returns an array of WorkersSkillLevel objects
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
    public function findOneBySomeField($value): ?WorkersSkillLevel
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
