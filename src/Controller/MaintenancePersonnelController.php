<?php

namespace App\Controller;

use App\Entity\TypesOfEMAR;
use App\Entity\QualityFactorWorkPerformed;
use App\Entity\MaintenancePersonnel;
use App\Form\MaintenancePersonnelType;
use App\Form\LevelQualType;
use App\Form\MatrixMintenancePersonnelWorkType;
use App\Repository\MaintenancePersonnelRepository;
use App\Repository\QualityFactorWorkPerformedRepository;
use App\Repository\AggregatesWTORepository;
use App\Repository\TypesOfEMARRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * @Route("/maintenancePersonnel")
 */
class MaintenancePersonnelController extends AbstractController
{
    /**
     * @Route("/", name="maintenance_personnel_index", methods={"GET"})
     */
    public function index(Request $request, MaintenancePersonnelRepository $maintenancePersonnelRepository, TypesOfEMARRepository $typesOfEMARRepository, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository, AggregatesWTORepository $aggregatesWTORepository): Response
    {
        $maintenancePersonnel = new MaintenancePersonnel();
        $form = $this->createForm(MaintenancePersonnelType::class, $maintenancePersonnel);
        $form->handleRequest($request);

        $matr = $maintenancePersonnelRepository->searchTypeOfEMAR($maintenancePersonnelRepository, $qualityFactorWorkPerformedRepository, $typesOfEMARRepository);
        $matr1 = $maintenancePersonnelRepository->searchAg($maintenancePersonnelRepository, $qualityFactorWorkPerformedRepository, $aggregatesWTORepository);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($maintenancePersonnel);
            $entityManager->flush();
        }



        return $this->render('maintenance_personnel/index.html.twig', [
            'maintenance_personnels' => $maintenancePersonnelRepository->findAll(),
            'aggregates_wtos' => $aggregatesWTORepository->findAll(),
            'matrix' => $matr,
            'matrix1' => $matr1,
            'count' => Count($typesOfEMARRepository->findAll()),
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
     * @Route("/{id}/edit", name="maintenance_personnel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MaintenancePersonnel $maintenancePersonnel, QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository, AggregatesWTORepository $aggregatesWTORepository, MaintenancePersonnelRepository $maintenancePersonnelRepository): Response
    {
        $qualityFactorWorkPerformed = new QualityFactorWorkPerformed();
        $form = $this->createForm(MatrixMintenancePersonnelWorkType::class, $qualityFactorWorkPerformed);
        $form->handleRequest($request);

        $form1 = $this->createForm(LevelQualType::class);
        $form1->handleRequest($request);

        if ($form->isSubmitted()) {
            $qualityFactorWorkPerformed->setMaintenancePersonnel($maintenancePersonnel);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($qualityFactorWorkPerformed);
            $entityManager->flush();
            return $this->redirectToRoute('maintenance_personnel_index');
        }
        $matr = $maintenancePersonnelRepository->searchAgGr(null, $maintenancePersonnel, $qualityFactorWorkPerformedRepository, $aggregatesWTORepository);
        if ($form1->isSubmitted()) {
            $assigned_category = $form1->get('assigned_category')->getData();
            $matr = $maintenancePersonnelRepository->searchAgGr($assigned_category, $maintenancePersonnel, $qualityFactorWorkPerformedRepository, $aggregatesWTORepository); 
        }

        return $this->render('maintenance_personnel/edit.html.twig', [
            'maintenance_Personnel' => $maintenancePersonnel,
            'matrix' => $matr,
            'form' => $form->createView(),
            'form1' => $form1->createView(),
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
