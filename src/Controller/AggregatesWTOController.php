<?php

namespace App\Controller;

use App\Entity\AggregatesWTO;
use App\Entity\TypesOfWTO;
use App\Form\AggregatesWTOType;
use App\Repository\AggregatesWTORepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aggregatesWTO")
 */
class AggregatesWTOController extends AbstractController
{
    /**
     * @Route("/", name="aggregates_wto_index", methods={"GET"})
     */
    public function index(AggregatesWTORepository $aggregatesWTORepository): Response
    {
        return $this->render('aggregates_wto/index.html.twig', [
            'aggregates_wtos' => $aggregatesWTORepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aggregates_wto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $aggregatesWTO = new AggregatesWTO();
        $form = $this->createForm(AggregatesWTOType::class, $aggregatesWTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aggregatesWTO);
            $entityManager->flush();

            return $this->redirectToRoute('types_of_wto_index');
        }

        return $this->render('aggregates_wto/new.html.twig', [
            'aggregates_wto' => $aggregatesWTO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aggregates_wto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AggregatesWTO $aggregatesWTO): Response
    {
        $form = $this->createForm(AggregatesWTOType::class, $aggregatesWTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('types_of_wto_index');
        }

        return $this->render('aggregates_wto/edit.html.twig', [
            'aggregates_wto' => $aggregatesWTO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aggregates_wto_delete", methods={"POST"})
     */
    public function delete(Request $request, AggregatesWTO $aggregatesWTO): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aggregatesWTO->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aggregatesWTO);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aggregates_wto_index');
    }
}
