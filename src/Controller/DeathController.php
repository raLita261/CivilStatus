<?php

namespace App\Controller;

use App\Entity\Death;
use App\Form\DeathType;
use App\Repository\DeathRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/death")
 */
class DeathController extends AbstractController
{
    /**
     * @Route("/", name="death_index", methods={"GET"})
     */
    public function index(DeathRepository $deathRepository): Response
    {
        return $this->render('death/index.html.twig', [
            'deaths' => $deathRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="death_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $death = new Death();
        $form = $this->createForm(DeathType::class, $death);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($death);
            $entityManager->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('death/new.html.twig', [
            'death' => $death,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="death_show", methods={"GET"})
     */
    public function show(Death $death): Response
    {
        return $this->render('death/show.html.twig', [
            'death' => $death,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="death_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Death $death): Response
    {
        $form = $this->createForm(DeathType::class, $death);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('death/edit.html.twig', [
            'death' => $death,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="death_delete", methods={"POST"})
     */
    public function delete(Request $request, Death $death): Response
    {
        if ($this->isCsrfTokenValid('delete' . $death->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($death);
            $entityManager->flush();
        }

        return $this->redirectToRoute('death_index');
    }
}
