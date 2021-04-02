<?php

namespace App\Controller;

use App\Entity\ParentUser;
use App\Form\ParentUserType;
use App\Repository\ParentUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/parent")
 */
class ParentUserController extends AbstractController
{
    /**
     * @Route("/", name="parent_user_index", methods={"GET"})
     */
    public function index(ParentUserRepository $parentUserRepository): Response
    {
        return $this->render('parent_user/index.html.twig', [
            'parent_users' => $parentUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="parent_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $parentUser = new ParentUser();
        $form = $this->createForm(ParentUserType::class, $parentUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($parentUser);
            $entityManager->flush();

            return $this->redirectToRoute('parent_user_new');
        }

        return $this->render('parent_user/new.html.twig', [
            'parent_user' => $parentUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parent_user_show", methods={"GET"})
     */
    public function show(ParentUser $parentUser): Response
    {
        return $this->render('parent_user/show.html.twig', [
            'parent_user' => $parentUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="parent_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ParentUser $parentUser): Response
    {
        $form = $this->createForm(ParentUserType::class, $parentUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('parent_user_index');
        }

        return $this->render('parent_user/edit.html.twig', [
            'parent_user' => $parentUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="parent_user_delete", methods={"POST"})
     */
    public function delete(Request $request, ParentUser $parentUser): Response
    {
        if ($this->isCsrfTokenValid('delete' . $parentUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($parentUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('parent_user_index');
    }
}
