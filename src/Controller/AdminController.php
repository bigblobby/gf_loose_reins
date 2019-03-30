<?php

namespace App\Controller;

use App\Form\Admin\AdminArticleFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_login")
     */
    public function loginAction(EntityManagerInterface $em ,Request $request)
    {
        $form = $this->createForm(AdminArticleFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $article = $form->getData();

            $em->persist($article);
            $em->flush();

        }

        return $this->render('admin/login.html.twig');
    }

    /**
     * @Route("admin/dashboard", name="admin_dashboard")
     */
    public function indexAction()
    {
        $form = $this->createForm(AdminArticleFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $article = $form->getData();

            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin_dashboard');
        }

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function logout()
    {
    }
}
