<?php

namespace App\Controller;

use App\Entity\QualityFactorWorkPerformed;
use App\Form\QualityFactorWorkPerformed1Type;
use App\Repository\QualityFactorWorkPerformedRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/quality/factor/work/performed")
 */
class QualityFactorWorkPerformedController extends AbstractController
{
    /**
     * @Route("/", name="quality_factor_work_performed_index", methods={"GET"})
     */
    public function index(QualityFactorWorkPerformedRepository $qualityFactorWorkPerformedRepository): Response
    {
        return $this->render('quality_factor_work_performed/index.html.twig', [
            'quality_factor_work_performeds' => $qualityFactorWorkPerformedRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="quality_factor_work_performed_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $qualityFactorWorkPerformed = new QualityFactorWorkPerformed();
        $form = $this->createForm(QualityFactorWorkPerformed1Type::class, $qualityFactorWorkPerformed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($qualityFactorWorkPerformed);
            $entityManager->flush();

            return $this->redirectToRoute('quality_factor_work_performed_index');
        }

        return $this->render('quality_factor_work_performed/new.html.twig', [
            'quality_factor_work_performed' => $qualityFactorWorkPerformed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quality_factor_work_performed_show", methods={"GET"})
     */
    public function show(QualityFactorWorkPerformed $qualityFactorWorkPerformed): Response
    {
        return $this->render('quality_factor_work_performed/show.html.twig', [
            'quality_factor_work_performed' => $qualityFactorWorkPerformed,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="quality_factor_work_performed_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, QualityFactorWorkPerformed $qualityFactorWorkPerformed): Response
    {
        $form = $this->createForm(QualityFactorWorkPerformed1Type::class, $qualityFactorWorkPerformed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('quality_factor_work_performed_index');
        }

        return $this->render('quality_factor_work_performed/edit.html.twig', [
            'quality_factor_work_performed' => $qualityFactorWorkPerformed,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="quality_factor_work_performed_delete", methods={"POST"})
     */
    public function delete(Request $request, QualityFactorWorkPerformed $qualityFactorWorkPerformed): Response
    {
        if ($this->isCsrfTokenValid('delete'.$qualityFactorWorkPerformed->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($qualityFactorWorkPerformed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('quality_factor_work_performed_index');
    }
}
