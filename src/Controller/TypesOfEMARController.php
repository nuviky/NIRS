<?php

namespace App\Controller;

use App\Entity\TypesOfEMAR;
use App\Form\TypesOfEMARType;
use App\Repository\TypesOfEMARRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/types_of_emar")
 */
class TypesOfEMARController extends AbstractController
{

    /**
     * @Route("/new", name="types_of_emar_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typesOfEMAR = new TypesOfEMAR();
        $form = $this->createForm(TypesOfEMARType::class, $typesOfEMAR);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typesOfEMAR);
            $entityManager->flush();

            return $this->redirectToRoute('types_of_wto_index');
        }

        return $this->render('types_of_emar/new.html.twig', [
            'types_of_emar' => $typesOfEMAR,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}", name="types_of_emar_show", methods={"GET"})
     */
    public function show(TypesOfEMAR $typesOfEMAR): Response
    {
        return $this->render('types_of_emar/show.html.twig', [
            'types_of_emar' => $typesOfEMAR,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="types_of_emar_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypesOfEMAR $typesOfEMAR): Response
    {
        $form = $this->createForm(TypesOfEMARType::class, $typesOfEMAR);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('types_of_wto_index');
        }

        return $this->render('types_of_emar/edit.html.twig', [
            'types_of_emar' => $typesOfEMAR,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_of_emar_delete", methods={"POST"})
     */
    public function delete(Request $request, TypesOfEMAR $typesOfEMAR): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typesOfEMAR->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typesOfEMAR);
            $entityManager->flush();
        }

        return $this->redirectToRoute('types_of_wto_index');
    }

}
