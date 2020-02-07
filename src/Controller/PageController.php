<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, SessionInterface $session)
    {
        $user = $session->get('nombre_usuario');
        return $this->render('/resultado.html.twig', [
            'user' => $user,
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, SessionInterface $session)
    {   
        $user = $session->get('nombre_usuario');
        return $this->render('daw2/login.html.twig', [
            'user' => $user,
            'title' => "DAW2 Login"
        ]);
    }

    /**
     * @Route("/form/sendlogin", name="sendlogin")
     */
    public function sendlogin(Request $request, SessionInterface $session)
    {
        $user= $request->request->get("user");
        $password= $request->request->get("password");
    if ($user!="" && $password!=""){

        $session->set('nombre_usuario', $user);
        $session->set('password', $password);
            return $this->redirectToRoute('index', [
        ]);}
    else{

           return $this->redirectToRoute('login');

        }

    }
    
    /**
     * @Route("/form/logOut", name="logOut")
     */
    public function logOut(Request $request, SessionInterface $session)
    {

        $session->invalidate();

                return $this->redirectToRoute('index');  



    }
}
