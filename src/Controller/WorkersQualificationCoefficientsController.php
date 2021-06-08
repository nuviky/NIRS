<?php

namespace App\Controller;

use App\Entity\WorkersQualificationCoefficients;
use App\Form\WorkersQualificationCoefficientsType;
use App\Repository\WorkersQualificationCoefficientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/workers/qualification/coefficients")
 */
class WorkersQualificationCoefficientsController extends AbstractController
{
    /**
     * @Route("/", name="workers_qualification_coefficients_index", methods={"GET"})
     */
    public function index(WorkersQualificationCoefficientsRepository $workersQualificationCoefficientsRepository): Response
    {
        return $this->render('workers_qualification_coefficients/index.html.twig', [
            'workers_qualification_coefficients' => $workersQualificationCoefficientsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="workers_qualification_coefficients_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $workersQualificationCoefficient = new WorkersQualificationCoefficients();
        $form = $this->createForm(WorkersQualificationCoefficientsType::class, $workersQualificationCoefficient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($workersQualificationCoefficient);
            $entityManager->flush();

            return $this->redirectToRoute('workers_qualification_coefficients_index');
        }

        return $this->render('workers_qualification_coefficients/new.html.twig', [
            'workers_qualification_coefficient' => $workersQualificationCoefficient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workers_qualification_coefficients_show", methods={"GET"})
     */
    public function show(WorkersQualificationCoefficients $workersQualificationCoefficient): Response
    {
        return $this->render('workers_qualification_coefficients/show.html.twig', [
            'workers_qualification_coefficient' => $workersQualificationCoefficient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="workers_qualification_coefficients_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WorkersQualificationCoefficients $workersQualificationCoefficient): Response
    {
        $form = $this->createForm(WorkersQualificationCoefficientsType::class, $workersQualificationCoefficient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('workers_qualification_coefficients_index');
        }

        return $this->render('workers_qualification_coefficients/edit.html.twig', [
            'workers_qualification_coefficient' => $workersQualificationCoefficient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workers_qualification_coefficients_delete", methods={"POST"})
     */
    public function delete(Request $request, WorkersQualificationCoefficients $workersQualificationCoefficient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workersQualificationCoefficient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($workersQualificationCoefficient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('workers_qualification_coefficients_index');
    }
}
