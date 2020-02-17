<?php

namespace App\Controller;

use App\Entity\Titulacion;
use App\Form\TitulacionType;
use App\Repository\TitulacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/titulacion")
 */
class TitulacionController extends AbstractController
{
    /**
     * @Route("/", name="titulacion_index", methods={"GET"})
     */
    public function index(TitulacionRepository $titulacionRepository): Response
    {
        return $this->render('titulacion/index.html.twig', [
            'titulacions' => $titulacionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="titulacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $titulacion = new Titulacion();
        $form = $this->createForm(TitulacionType::class, $titulacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($titulacion);
            $entityManager->flush();

            return $this->redirectToRoute('titulacion_index');
        }

        return $this->render('titulacion/new.html.twig', [
            'titulacion' => $titulacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="titulacion_show", methods={"GET"})
     */
    public function show(Titulacion $titulacion): Response
    {
        return $this->render('titulacion/show.html.twig', [
            'titulacion' => $titulacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="titulacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Titulacion $titulacion): Response
    {
        $form = $this->createForm(TitulacionType::class, $titulacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('titulacion_index');
        }

        return $this->render('titulacion/edit.html.twig', [
            'titulacion' => $titulacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="titulacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Titulacion $titulacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$titulacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($titulacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('titulacion_index');
    }
}
