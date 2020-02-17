<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Titulacion;
use App\Entity\Proyecto;
use App\Entity\Prof;
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
        $grado = $this->getDoctrine()->getRepository(Titulacion::Class)->findAll();
        $profe = $this->getDoctrine()->getRepository(Prof::Class)->findAll();
        $proyect = $this->getDoctrine()->getRepository(Proyecto::Class)->findAll();

        $user = $session->get('nombre_usuario');
        return $this->render('/index.html.twig', [
            'dataGrado' => $grado,
            'dataProfe' => $profe,
            'dataProyect' => $proyect,
            'first3' => array_slice(array_reverse($proyect),0,3),

            'user' => $user,
            'controller_name' => 'PageController',
        ]);
    }

    /**
     * @Route("/resultados/{currentPage?1}", name="resultados")
     */
    public function resultados(Request $request, SessionInterface $session,$currentPage)
    {
        $grado= $request->request->get("grado");
        $profesor= $request->request->get("profesor");
        $anyo= $request->request->get("anyo");
        $titulo= $request->request->get("titulo");

        $criterios['titulo']=$titulo;

        $resultado = $this->getDoctrine()
            ->getRepository(Proyecto::class)
            ->findByAdvanced($titulo,$anyo,$profesor,$grado);


        $user = $session->get('nombre_usuario');

        return $this->render('/resultados.html.twig', [
            'currentPage' => $currentPage,
            'data' => $this->proyecto,
            'resultado' => $resultado,            
            'user' => $user,
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
        ->getRepository(User::class)
        ->findOneBy(['username' => $user]);


    if ($usuarioBBDD){
        if ($usuarioBBDD->getPassword() == $password) {
            $session->set('nombre_usuario', $user);
            $session->set('password', $password);
                return $this->redirectToRoute('index', [
                    'info' => $usuarioBBDD
    
            ]);
        }
}
    else{

           return $this->redirectToRoute('index');

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



    private $proyecto = [

    ];
}
