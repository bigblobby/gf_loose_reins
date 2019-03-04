<?php

namespace App\Controller;

use App\Entity\Navigation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default_homepage")
     */
    public function homepageAction(EntityManagerInterface $em)
    {
        $links = $em->getRepository(Navigation::class)->findAll();

        return $this->render('default/homepage.html.twig', [
            'links' => $links
        ]);
    }
}
