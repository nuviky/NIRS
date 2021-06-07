<?php

namespace App\Controller;

use App\Entity\TypesOfWTO;
use App\Form\TypesOfWTOType;
use App\Repository\TypesOfWTORepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class TypesOfWTOController extends AbstractController
{
    /**
     * @Route("/", name="types_of_w_t_o_index", methods={"GET"})
     */
    public function index(TypesOfWTORepository $typesOfWTORepository): Response
    {
        return $this->render('types_of_wto/index.html.twig', [
            'types_of_w_t_os' => $typesOfWTORepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="types_of_w_t_o_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typesOfWTO = new TypesOfWTO();
        $form = $this->createForm(TypesOfWTOType::class, $typesOfWTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typesOfWTO);
            $entityManager->flush();

            return $this->redirectToRoute('types_of_w_t_o_index');
        }

        return $this->render('types_of_wto/new.html.twig', [
            'types_of_wto' => $typesOfWTO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_of_wto_show", methods={"GET"})
     */
    public function show(TypesOfWTO $typesOfWTO): Response
    {
        return $this->render('types_of_wto/show.html.twig', [
            'types_of_wto' => $typesOfWTO,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="types_of_w_t_o_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypesOfWTO $typesOfWTO): Response
    {
        $form = $this->createForm(TypesOfWTOType::class, $typesOfWTO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('types_of_w_t_o_index');
        }

        return $this->render('types_of_wto/edit.html.twig', [
            'types_of_w_t_o' => $typesOfWTO,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="types_of_w_t_o_delete", methods={"POST"})
     */
    public function delete(Request $request, TypesOfWTO $typesOfWTO): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typesOfWTO->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typesOfWTO);
            $entityManager->flush();
        }

        return $this->redirectToRoute('types_of_w_t_o_index');
    }
}
