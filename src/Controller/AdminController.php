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
     * @Route("/admin", name="admin_article_new")
     */
    public function indexAction(EntityManagerInterface $em ,Request $request)
    {
        $form = $this->createForm(AdminArticleFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $article = $form->getData();

            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('admin_article_new');
        }

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
