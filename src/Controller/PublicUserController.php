<?php

namespace App\Controller;

use App\Entity\PublicUser;
use App\Form\PublicUserType;
use App\Repository\PublicUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * @Route("/publicuser")
 */
class PublicUserController extends AbstractController
{
    /**
     * @Route("/", name="public_user_index", methods={"GET"})
     */
    public function index(PublicUserRepository $publicUserRepository): Response
    {
        return $this->render('public_user/index.html.twig', [
            'public_users' => $publicUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="public_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $publicUser = new PublicUser();
        $form = $this->createForm(PublicUserType::class, $publicUser);
        $form->handleRequest($request);

        //select all from parentUser
        $listeAllParent = $entityManager->getRepository('App:ParentUser')->findAll();

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();
            //generate rand num
            $publicUser->setVerificationCode(rand());
            $entityManager->persist($publicUser);
            $entityManager->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('public_user/new.html.twig', [
            'public_user' => $publicUser,
            'form' => $form->createView(),
            'allParentUser' => $listeAllParent
        ]);
    }

    /**
     * @Route("/{id}", name="public_user_show", methods={"GET"})
     */
    public function show(PublicUser $publicUser): Response
    {
        return $this->render('public_user/show.html.twig', [
            'public_user' => $publicUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="public_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PublicUser $publicUser): Response
    {
        $form = $this->createForm(PublicUserType::class, $publicUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('public_user/edit.html.twig', [
            'public_user' => $publicUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="public_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PublicUser $publicUser): Response
    {
        if ($this->isCsrfTokenValid('delete' . $publicUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($publicUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('public_user_index');
    }

    /**
     * @Route("/{id}/pdf", name="make_pdf", methods={"GET"})
     */
    public function makePdf(Request $request, PublicUser $publicUser)
    {
        //entity manager
        $entityManager = $this->getDoctrine()->getManager();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('public_user/pdf.html.twig', [
            'title' => "Welcome to our PDF Test",
            'publicUser' => $publicUser,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }
}
