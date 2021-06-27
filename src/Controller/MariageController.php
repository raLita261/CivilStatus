<?php

namespace App\Controller;

use App\Entity\Mariage;
use App\Form\MariageType;
use App\Repository\MariageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mariage")
 */
class MariageController extends AbstractController
{
    /**
     * @Route("/", name="mariage_index", methods={"GET"})
     */
    public function index(MariageRepository $mariageRepository): Response
    {
        return $this->render('mariage/index.html.twig', [
            'mariages' => $mariageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mariage_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mariage = new Mariage();
        $form = $this->createForm(MariageType::class, $mariage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mariage);
            $entityManager->flush();

            return $this->redirectToRoute('mariage_index');
        }

        return $this->render('mariage/new.html.twig', [
            'mariage' => $mariage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mariage_show", methods={"GET"})
     */
    public function show(Mariage $mariage): Response
    {
        return $this->render('mariage/show.html.twig', [
            'mariage' => $mariage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mariage_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mariage $mariage): Response
    {
        $form = $this->createForm(MariageType::class, $mariage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('mariage/edit.html.twig', [
            'mariage' => $mariage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mariage_delete", methods={"POST"})
     */
    public function delete(Request $request, Mariage $mariage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mariage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mariage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mariage_index');
    }
}
