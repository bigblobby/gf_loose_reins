<?php

namespace App\Controller;

use App\Entity\Homepage;
use App\Entity\MainPage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_default_homepage")
     */
    public function homepageAction(EntityManagerInterface $em)
    {
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        $homepage = $em->getRepository(Homepage::class)->findOneBy(['title' => 'Homepage']);

        return $this->render('default/homepage.html.twig', [
            'mainPages' => $mainPages,
            'homepage' => $homepage
        ]);
    }
}
