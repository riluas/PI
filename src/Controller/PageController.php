<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="")
     */
    public function index()
    {
        return $this->render('/resultado.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
