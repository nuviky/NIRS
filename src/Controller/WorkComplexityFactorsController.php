<?php

namespace App\Controller;

use App\Entity\WorkComplexityFactors;
use App\Form\WorkComplexityFactorsType;
use App\Repository\WorkComplexityFactorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/work")
 */
class WorkComplexityFactorsController extends AbstractController
{
    /**
     * @Route("/", name="work_complexity_factors_index", methods={"GET"})
     */
    public function index(WorkComplexityFactorsRepository $workComplexityFactorsRepository): Response
    {
        return $this->render('work_complexity_factors/index.html.twig', [
            'work_complexity_factors' => $workComplexityFactorsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="work_complexity_factors_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $workComplexityFactor = new WorkComplexityFactors();
        $form = $this->createForm(WorkComplexityFactorsType::class, $workComplexityFactor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($workComplexityFactor);
            $entityManager->flush();

            return $this->redirectToRoute('types_of_wto_index');
        }

        return $this->render('work_complexity_factors/new.html.twig', [
            'work_complexity_factor' => $workComplexityFactor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="work_complexity_factors_show", methods={"GET"})
     */
    public function show(WorkComplexityFactors $workComplexityFactor): Response
    {
        return $this->render('work_complexity_factors/show.html.twig', [
            'work_complexity_factor' => $workComplexityFactor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="work_complexity_factors_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WorkComplexityFactors $workComplexityFactor): Response
    {
        $form = $this->createForm(WorkComplexityFactorsType::class, $workComplexityFactor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('types_of_wto_index');
        }

        return $this->render('work_complexity_factors/edit.html.twig', [
            'work_complexity_factor' => $workComplexityFactor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="work_complexity_factors_delete", methods={"POST"})
     */
    public function delete(Request $request, WorkComplexityFactors $workComplexityFactor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workComplexityFactor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($workComplexityFactor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('types_of_wto_index');
    }
}
