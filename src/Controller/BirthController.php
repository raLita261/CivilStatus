<?php

namespace App\Controller;

use App\Entity\Birth;
use App\Form\BirthType;
use App\Repository\BirthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/birth")
 */
class BirthController extends AbstractController
{
    /**
     * @Route("/", name="birth_index", methods={"GET"})
     */
    public function index(BirthRepository $birthRepository): Response
    {
        return $this->render('birth/index.html.twig', [
            'births' => $birthRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="birth_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = $this->getUser();
        $birth = new Birth();
        $form = $this->createForm(BirthType::class, $birth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $birth->setOfficier($user);
            $entityManager->persist($birth);
            $entityManager->flush();

            return $this->redirectToRoute('birth_index');
        }

        return $this->render('birth/new.html.twig', [
            'birth' => $birth,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/users", name="birth_users", methods={"GET","POST"})
     */
    public function users(Request $request): Response
    {
        $user = $this->getUser();
        $birth = new Birth();
        $form = $this->createForm(BirthType::class, $birth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            //get public user details
            $userDetails = $entityManager->getRepository('App:PublicUser')->findOneBy(['user' => $user]);
            $birth->setPublicUser($userDetails);
            $entityManager->persist($birth);
            $entityManager->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('birth/newbirth.html.twig', [
            'birth' => $birth,
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}", name="birth_show", methods={"GET"})
     */
    public function show(Birth $birth): Response
    {
        return $this->render('birth/show.html.twig', [
            'birth' => $birth,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="birth_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Birth $birth): Response
    {
        $form = $this->createForm(BirthType::class, $birth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('birth/edit.html.twig', [
            'birth' => $birth,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="birth_delete", methods={"POST"})
     */
    public function delete(Request $request, Birth $birth): Response
    {
        if ($this->isCsrfTokenValid('delete' . $birth->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($birth);
            $entityManager->flush();
        }

        return $this->redirectToRoute('birth_index');
    }
}
