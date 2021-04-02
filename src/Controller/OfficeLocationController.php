<?php

namespace App\Controller;

use App\Entity\OfficeLocation;
use App\Form\OfficeLocationType;
use App\Repository\OfficeLocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/office/location")
 */
class OfficeLocationController extends AbstractController
{
    /**
     * @Route("/", name="office_location_index", methods={"GET"})
     */
    public function index(OfficeLocationRepository $officeLocationRepository): Response
    {
        return $this->render('office_location/index.html.twig', [
            'office_locations' => $officeLocationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="office_location_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $officeLocation = new OfficeLocation();
        $form = $this->createForm(OfficeLocationType::class, $officeLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($officeLocation);
            $entityManager->flush();

            return $this->redirectToRoute('office_location_index');
        }

        return $this->render('office_location/new.html.twig', [
            'office_location' => $officeLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="office_location_show", methods={"GET"})
     */
    public function show(OfficeLocation $officeLocation): Response
    {
        return $this->render('office_location/show.html.twig', [
            'office_location' => $officeLocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="office_location_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OfficeLocation $officeLocation): Response
    {
        $form = $this->createForm(OfficeLocationType::class, $officeLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('office_location_index');
        }

        return $this->render('office_location/edit.html.twig', [
            'office_location' => $officeLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="office_location_delete", methods={"POST"})
     */
    public function delete(Request $request, OfficeLocation $officeLocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$officeLocation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($officeLocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('office_location_index');
    }
}
