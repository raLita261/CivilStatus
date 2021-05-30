<?php

namespace App\Controller;

use App\Entity\Birth;
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
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($user  == null) {

            return $this->redirectToRoute('app_login');
        }
        $qb = $entityManager->createQueryBuilder();
        $selectedUserAlive = $qb->select('u')
            ->from('App:PublicUser', 'u')
            ->where('u.DoD IS NULL')
            ->getQuery()
            ->getResult();

        //check user details
        $userDetails = $entityManager->getRepository('App:PublicUser')->findOneBy(['user' => $user]);

        $fecthAllBirth = $entityManager->getRepository('App:Birth')->findAll();
        return $this->render('public_user/index.html.twig', [
            'public_users' => $selectedUserAlive,
            'birthList' => $fecthAllBirth,
            'userDetails' => $userDetails,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/new", name="public_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($user  == null) {

            return $this->redirectToRoute('app_login');
        }

        $publicUser = new PublicUser();
        $form = $this->createForm(PublicUserType::class, $publicUser);
        $form->handleRequest($request);

        //check user details
        $userDetails = $entityManager->getRepository('App:PublicUser')->findOneBy(['user' => $user]);

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();
            //generate rand num
            $publicUser->setUser($user);
            $entityManager->persist($publicUser);
            $entityManager->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('public_user/new.html.twig', [
            'public_user' => $publicUser,
            'form' => $form->createView(),
            'userDetails' => $userDetails

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
        $entityManager = $this->getDoctrine()->getManager();
        $form = $this->createForm(PublicUserType::class, $publicUser);
        $form->handleRequest($request);
        //select all from parentUser
        $listeAllParent = $entityManager->getRepository('App:ParentUser')->findAll();


        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('public_user_index');
        }

        return $this->render('public_user/edit.html.twig', [
            'public_user' => $publicUser,
            'form' => $form->createView(),
            'allParentUser' => $listeAllParent
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

    /**
     * @Route("/{id}/pdfBirth", name="make_pdf_birth", methods={"GET"})
     */
    public function makeBirthPdf(Request $request, Birth $birth)
    {
        //entity manager
        $entityManager = $this->getDoctrine()->getManager();

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('birth/pdf.html.twig', [
            'title' => "Welcome to our PDF Test",
            'birth' => $birth,
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
