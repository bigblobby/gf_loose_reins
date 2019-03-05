<?php

namespace App\Controller;

use App\Entity\Navigation;
use App\Entity\Page;
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
        $mainNavLinks = $em->getRepository(Navigation::class)->findAll();

        return $this->render('default/homepage.html.twig', [
            'mainNavLinks' => $mainNavLinks
        ]);
    }


    /**
     * @Route("/{slug}", name="app_default_interim_page")
     */
    public function interimPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainNavLinks = $em->getRepository(Navigation::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainLink = $em->getRepository(Navigation::class)->findOneBy(['slug' => $slug]);
        $subLinks = $mainLink->getPages();

        return $this->render('default/interim-page.html.twig', [
            'mainNavLinks' => $mainNavLinks,
            'subLinks' => $subLinks,
            'mainLink' => $mainLink
        ]);
    }
}
