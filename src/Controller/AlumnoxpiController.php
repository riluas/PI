<?php

namespace App\Controller;

use App\Entity\Alumnoxpi;
use App\Form\AlumnoxpiType;
use App\Repository\AlumnoxpiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/alumnoxpi")
 */
class AlumnoxpiController extends AbstractController
{
    /**
     * @Route("/", name="alumnoxpi_index", methods={"GET"})
     */
    public function index(AlumnoxpiRepository $alumnoxpiRepository): Response
    {
        return $this->render('alumnoxpi/index.html.twig', [
            'alumnoxpis' => $alumnoxpiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="alumnoxpi_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $alumnoxpi = new Alumnoxpi();
        $form = $this->createForm(AlumnoxpiType::class, $alumnoxpi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($alumnoxpi);
            $entityManager->flush();

            return $this->redirectToRoute('alumnoxpi_index');
        }

        return $this->render('alumnoxpi/new.html.twig', [
            'alumnoxpi' => $alumnoxpi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alumnoxpi_show", methods={"GET"})
     */
    public function show(Alumnoxpi $alumnoxpi): Response
    {
        return $this->render('alumnoxpi/show.html.twig', [
            'alumnoxpi' => $alumnoxpi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="alumnoxpi_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Alumnoxpi $alumnoxpi): Response
    {
        $form = $this->createForm(AlumnoxpiType::class, $alumnoxpi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('alumnoxpi_index');
        }

        return $this->render('alumnoxpi/edit.html.twig', [
            'alumnoxpi' => $alumnoxpi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="alumnoxpi_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Alumnoxpi $alumnoxpi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alumnoxpi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($alumnoxpi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('alumnoxpi_index');
    }
}
