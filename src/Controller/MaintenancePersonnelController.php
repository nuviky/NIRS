<?php

namespace App\Controller;

use App\Entity\AggregatesWTO;
use App\Entity\QualityFactorWorkPerformed;
use App\Entity\MaintenancePersonnel;
use App\Form\MaintenancePersonnelType;
use App\Form\MatrixMintenancePersonnelWorkType;
use App\Repository\MaintenancePersonnelRepository;
use App\Repository\QualityFactorWorkPerformedRepository;
use App\Repository\AggregatesWTORepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/maintenancePersonnel")
 */
class MaintenancePersonnelController extends AbstractController
{
    /**
     * @Route("/", name="maintenance_personnel_index", methods={"GET"})
     */
    public function index(Request $request, MaintenancePersonnelRepository $maintenancePersonnelRepository, AggregatesWTORepository $aggregatesWTORepository): Response
    {
        $maintenancePersonnel = new MaintenancePersonnel();
        $form = $this->createForm(MaintenancePersonnelType::class, $maintenancePersonnel);
        $form->handleRequest($request);
        $form = $this->createForm(MaintenancePersonnelType::class, $maintenancePersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maintenancePersonnel);
            $entityManager->flush();
        }

        return $this->render('maintenance_personnel/index.html.twig', [
            'maintenance_personnels' => $maintenancePersonnelRepository->findAll(),
            'aggregates_wtos' => $aggregatesWTORepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/new", name="maintenance_personnel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $maintenancePersonnel = new MaintenancePersonnel();
        $form = $this->createForm(MaintenancePersonnelType::class, $maintenancePersonnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maintenancePersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('maintenance_personnel_index');
        }

        return $this->render('maintenance_personnel/new.html.twig', [
            'maintenance_personnel' => $maintenancePersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="maintenance_personnel_show", methods={"GET"})
     */
    public function show(Request $request, MaintenancePersonnel $maintenancePersonnel, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository): Response
    {
        $qualityFactorWorkPerformed = new QualityFactorWorkPerformed();
        $form = $this->createForm(MatrixMintenancePersonnelWorkType::class, $qualityFactorWorkPerformed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qualityFactorWorkPerformed->setQualityFactor('0');
            $qualityFactorWorkPerformed->setQualityFactor1('0');
            $qualityFactorWorkPerformed->setQualityFactor2('0');
            $qualityFactorWorkPerformed->setQualityFactor3('0');
            $qualityFactorWorkPerformed->setQualityFactor4('0');
            $qualityFactorWorkPerformed->setQualityFactor5('0');
            // $qualityFactorWorkPerformed->setMaintenancePersonnel($maintenancePersonnel);
            // $qualityFactorWorkPerformed->setRelation();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maintenancePersonnel);
            $entityManager->flush();

            return $this->redirectToRoute('maintenance_personnel_index');
        }
        return $this->render('maintenance_personnel/show.html.twig', [
            'maintenance_personnel' => $maintenancePersonnel,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="maintenance_personnel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaintenancePersonnel $maintenancePersonnel, MaintenancePersonnelRepository $maintenancePersonnelRepository, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository): Response
    {
        $qualityFactorWorkPerformed = new QualityFactorWorkPerformed();
        $form = $this->createForm(MatrixMintenancePersonnelWorkType::class, $qualityFactorWorkPerformed);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            //$form->get('email')->getData() , array('relation' => $form->get('relation')->getData())
            $search = $qualityFactorWorkPerformedRepository->findOneBy(array('maintenancePersonnel' => $maintenancePersonnel, 'relation' => $form->get('relation')->getData()));

            if (is_null($search)) {
                $qualityFactorWorkPerformed->setQualityFactor(0);
                $qualityFactorWorkPerformed->setQualityFactor1(0);
                $qualityFactorWorkPerformed->setQualityFactor2(0);
                $qualityFactorWorkPerformed->setQualityFactor3(0);
                $qualityFactorWorkPerformed->setQualityFactor4(0);
                $qualityFactorWorkPerformed->setQualityFactor5(0);
                $qualityFactorWorkPerformed->setMaintenancePersonnel($maintenancePersonnel);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($qualityFactorWorkPerformed);
                $entityManager->flush();
            }
            else {
                if ($form->get('qualityfactor')->getData() == '-2') {
                    $search->setQualityFactor((int)$search->getQualityFactor() + 1);
                }
                else if ($form->get('qualityfactor')->getData() == '-1') {
                    $search->setQualityFactor1((int)$search->getQualityFactor1() + 1);
                }
                else if ($form->get('qualityfactor')->getData() == '0') {
                    $search->setQualityFactor2((int)$search->getQualityFactor2() + 1);
                }
                else if ($form->get('qualityfactor')->getData() == '1') {
                    $search->setQualityFactor3((int)$search->getQualityFactor3() + 1);
                }
                else if ($form->get('qualityfactor')->getData() == '2') {
                    $search->setQualityFactor4((int)$search->getQualityFactor4() + 1);
                }
                else if ($form->get('qualityfactor')->getData() == '3') {
                    $search->setQualityFactor5((int)$search->getQualityFactor5() + 1);
                }
                $this->getDoctrine()->getManager()->flush();
            }
            //return $this->redirectToRoute('maintenance_personnel_index');
        }

        return $this->render('maintenance_personnel/edit.html.twig', [
            'maintenance_personnels' => $maintenancePersonnelRepository->findAll(),
            'maintenance_Personnel' => $maintenancePersonnel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="maintenance_personnel_delete", methods={"POST"})
     */
    public function delete(Request $request, MaintenancePersonnel $maintenancePersonnel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maintenancePersonnel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($maintenancePersonnel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('maintenance_personnel_index');
    }
}
