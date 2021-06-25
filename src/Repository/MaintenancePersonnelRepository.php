<?php

namespace App\Repository;

use App\Entity\MaintenancePersonnel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\QualityFactorWorkPerformedRepository;
use App\Repository\AggregatesWTORepository;
use App\Repository\TypesOfEMARRepository;

/**
 * @method MaintenancePersonnel|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaintenancePersonnel|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaintenancePersonnel[]    findAll()
 * @method MaintenancePersonnel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaintenancePersonnelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaintenancePersonnel::class);
    }

    // /**
    //  * @return MaintenancePersonnel[] Returns an array of MaintenancePersonnel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaintenancePersonnel
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function searchAgGr($assigned_category, MaintenancePersonnel $maintenancePersonnel, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository, AggregatesWTORepository $aggregatesWTORepository)
    {
        $matr = array();
        $aggregatesWTO = $aggregatesWTORepository->findAll();
        foreach ($aggregatesWTO as $aggregateWTO) {
            if (Count($aggregateWTO->getRelation()) > 0) {  
                $QFWP = array();
                $tmp = array('aggregate' => '','-2' => '0', '-1' => '0', '0' => '0', '1' => '0', '2' => '0', '3' => '0', 'count' => '', 'levelQual' => '');
                foreach ($aggregateWTO->getRelation() as $typeOfEMAR) {
                    array_push($QFWP, $qualityFactorWorkPerformedRepository->findBy(array('maintenancePersonnel' => $maintenancePersonnel, 'TypeOfEMAR' => $typeOfEMAR)));
                }
                $qwe = Count($QFWP[0]);
                for ($i=0; $i < Count($QFWP[0]); $i++) {
                    if ($QFWP[0][$i]->getQualityFactor() == '-2') {
                        $tmp['-2'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '-1') {
                        $tmp['-1'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '0') {
                        $tmp['0'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '1') {
                        $tmp['1'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '2') {
                        $tmp['2'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '3') {
                        $tmp['3'] += 1;
                    }
                }
                $tmp['aggregate'] = $aggregateWTO;
                $tmp['count'] = $tmp['-2'] + $tmp['-1'] + $tmp['0'] + $tmp['1'] + $tmp['2'] + $tmp['3'];

                if (!is_null($assigned_category)) { 
                    $temp = 0.0;
                    $sum_complexity_coefficients_work = 0;
                    $QFWP = array();
                    foreach ($aggregateWTO->getRelation() as $typeOfEMAR) {
                        array_push($QFWP, $qualityFactorWorkPerformedRepository->findBy(array('maintenancePersonnel' => $maintenancePersonnel,'TypeOfEMAR' => $typeOfEMAR)));
                        foreach ($typeOfEMAR->getWorkComplexityFactors() as $workComplexityFactor) {
                            $sum_complexity_coefficients_work += (float) $workComplexityFactor->getWorkComplexityFactor();
                        }
                    }
                    $countQFWP = Count($QFWP[0]);
                    for ($i=0; $i < Count($QFWP[0]); $i++) {
                        $temp += (float) $QFWP[0][$i]->getQualityFactor() * $sum_complexity_coefficients_work;
                    }
                    $temp1 = $temp / $countQFWP;
                    $levelQual = $assigned_category + $temp1;
                    $tmp['levelQual'] = $levelQual;
                }
                else {
                    $tmp['levelQual'] = '-';
                }
                
                array_push($matr, $tmp);
            }
        }
        return $matr;
    }

    public function searchTypeOfEMAR(MaintenancePersonnelRepository $maintenancePersonnelRepository, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository, TypesOfEMARRepository $typesOfEMARRepository)
    {
        $matr = array();
        $maintenancePersonnel_ = $maintenancePersonnelRepository->findAll();
        foreach ($maintenancePersonnelRepository->findAll() as $maintenancePersonnel_) {
            $matrGr = array();
            foreach ($typesOfEMARRepository->findAll() as $typeOfEMAR) {
                $tmp = array('typeOfWTO' => '','-2' => '0', '-1' => '0', '0' => '0', '1' => '0', '2' => '0', '3' => '0');
                $QFWP = array();
                array_push($QFWP, $qualityFactorWorkPerformedRepository->findBy(array('maintenancePersonnel' => $maintenancePersonnel_, 'TypeOfEMAR' => $typeOfEMAR)));
                for ($i=0; $i < Count($QFWP[0]); $i++) {
                    if ($QFWP[0][$i]->getQualityFactor() == '-2') {
                        $tmp['-2'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '-1') {
                        $tmp['-1'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '0') {
                        $tmp['0'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '1') {
                        $tmp['1'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '2') {
                        $tmp['2'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '3') {
                        $tmp['3'] += 1;
                    }
                }
                $tmp['typeOfWTO'] = $typeOfEMAR;
                array_push($matrGr, $tmp);
            }
            array_push($matr, $matrGr);
        }
        return $matr;
    }

    public function searchAg(MaintenancePersonnelRepository $maintenancePersonnelRepository, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository, AggregatesWTORepository $aggregatesWTORepository)
    {
        $matr1 = array();
        $aggregatesWTO = $aggregatesWTORepository->findAll();
        foreach ($aggregatesWTO as $aggregateWTO) {
            if (Count($aggregateWTO->getRelation()) > 0) {  
                $QFWP = array();
                $tmp = array('aggregate' => '','-2' => '0', '-1' => '0', '0' => '0', '1' => '0', '2' => '0', '3' => '0', 'count' => '',);
                foreach ($aggregateWTO->getRelation() as $typeOfEMAR) {
                    array_push($QFWP, $qualityFactorWorkPerformedRepository->findBy(array('TypeOfEMAR' => $typeOfEMAR)));
                }
                $qwe = Count($QFWP[0]);
                for ($i=0; $i < Count($QFWP[0]); $i++) {
                    if ($QFWP[0][$i]->getQualityFactor() == '-2') {
                        $tmp['-2'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '-1') {
                        $tmp['-1'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '0') {
                        $tmp['0'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '1') {
                        $tmp['1'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '2') {
                        $tmp['2'] += 1;
                    }
                    else if ($QFWP[0][$i]->getQualityFactor() == '3') {
                        $tmp['3'] += 1;
                    }
                }
                $tmp['aggregate'] = $aggregateWTO->getAggregateWTO();
                $tmp['count'] = $tmp['-2'] + $tmp['-1'] + $tmp['0'] + $tmp['1'] + $tmp['2'] + $tmp['3'];
                array_push($matr1, $tmp);
            }
        }
        return $matr1;
    }
}
