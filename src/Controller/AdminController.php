<?php

namespace App\Controller;

use App\Form\Admin\AdminArticleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction()
    {
        $form = $this->createForm(AdminArticleFormType::class);

        return $this->render('admin/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
