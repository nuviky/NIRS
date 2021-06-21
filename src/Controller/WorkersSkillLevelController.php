<?php

namespace App\Controller;

use App\Entity\WorkersSkillLevel;
use App\Form\WorkersSkillLevelType;
use App\Repository\WorkersSkillLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/workers_skill")
 */
class WorkersSkillLevelController extends AbstractController
{

    /**
     * @Route("/new", name="workers_skill_level_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $workersSkillLevel = new WorkersSkillLevel();
        $form = $this->createForm(WorkersSkillLevelType::class, $workersSkillLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($workersSkillLevel);
            $entityManager->flush();

            return $this->redirectToRoute('maintenance_personnel_index');
        }

        return $this->render('workers_skill_level/new.html.twig', [
            'workers_skill_level' => $workersSkillLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workers_skill_level_show", methods={"GET"})
     */
    public function show(WorkersSkillLevel $workersSkillLevel): Response
    {
        return $this->render('workers_skill_level/show.html.twig', [
            'workers_skill_level' => $workersSkillLevel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="workers_skill_level_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WorkersSkillLevel $workersSkillLevel): Response
    {
        $form = $this->createForm(WorkersSkillLevelType::class, $workersSkillLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('maintenance_personnel_index');
        }

        return $this->render('workers_skill_level/edit.html.twig', [
            'workers_skill_level' => $workersSkillLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workers_skill_level_delete", methods={"POST"})
     */
    public function delete(Request $request, WorkersSkillLevel $workersSkillLevel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workersSkillLevel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($workersSkillLevel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('maintenance_personnel_index');
    }
}
