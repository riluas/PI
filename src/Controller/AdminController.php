<?php

namespace App\Controller;
use App\Entity\Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function admin(Request $request, SessionInterface $session)
    {
        $user1 = $session->get('admin_user');

        if ($user1=="") {
            return $this->redirectToRoute('adminLogin');
        };

        return $this->render('admin/layout.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $user1,

        ]);
    }

   /**
     * @Route("/adminLogin", name="adminLogin")
     */
    public function loginadmin(Request $request, SessionInterface $session)
    {
        $user1 = $session->get('admin_user');

        $userAdmin= $request->request->get("userAdmin");
        $passwordAdmin= $request->request->get("passwordAdmin");

        $adminBBDD=$this->getDoctrine()
        ->getRepository(Admin::class)
        ->findOneBy(['admin_Name' => $userAdmin]);

            if ($user1) {
             return $this->redirectToRoute('admin');}
            if ($adminBBDD){
            if ($adminBBDD->getPassword()==$passwordAdmin) {
                $session->set('admin_user', $userAdmin);
                $session->set('password', $passwordAdmin);
                    return $this->redirectToRoute('admin', [
                        'userAdmin' => "",
                ]);
            }
}

        else{

            return $this->render('admin/adminLogin.html.twig', [

                'controller_name' => 'AdminController',
                'userAdmin' =>"",
                ]);
            }
    }

    /**
     * @Route("/form/AdminlogOut", name="AdminlogOut")
     */
    public function logOut(Request $request, SessionInterface $session)
    {
        $session->clear();
        $session->invalidate();
                return $this->redirectToRoute('adminLogin');

    }
    
}
