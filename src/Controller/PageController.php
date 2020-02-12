<?php

namespace App\Controller;
use App\Entity\Usuario;
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

        $usuarioBBDD=$this->getDoctrine()
        ->getRepository(Usuario::class)
        ->findOneBy(['nombre' => $user]);

        $passwordBBDD=$this->getDoctrine()
        ->getRepository(Usuario::class)
        ->findOneBy(['contrasenya' => $password]);

    if ($user !="" && $password !=""){

        $session->set('nombre_usuario', $user);
        $session->set('password', $password);
            return $this->redirectToRoute('index', [
                'info' => $usuarioBBDD

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
        $session->clear();
        $session->invalidate();
                return $this->redirectToRoute('index');

    }



    /**
    * @Route("/pagResults/{currentPage?1}", name="paginador")
    */
        public function paginador(Request $request, SessionInterface $session, $currentPage)
        {
            $user = $session->get('nombre_usuario');
            

            return $this->render('pagResults.html.twig',[
                'currentPage' => $currentPage,
                'user' => $user,
                'data' => $this->proyecto,
                'controller_name' => 'PageController',

            ]);
        }

}
