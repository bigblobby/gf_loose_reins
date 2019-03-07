<?php

namespace App\Controller;

use App\Entity\Homepage;
use App\Entity\MainPage;
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
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        $homepage = $em->getRepository(Homepage::class)->findOneBy(['title' => 'Homepage']);

        return $this->render('default/homepage.html.twig', [
            'mainPages' => $mainPages,
            'homepage' => $homepage
        ]);
    }



    /**
     * @Route("/cabins", name="app_default_cabins")
     */
    public function cabinsPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainLink = $em->getRepository(MainPage::class)->findOneBy(['slug' => $slug]);
        $subLinks = $mainLink->getPages();

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainLink' => $mainLink
        ]);
    }

    /**
     * @Route("/{slug}", name="app_default_interim_page")
     */
    public function interimPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainLink = $em->getRepository(MainPage::class)->findOneBy(['slug' => $slug]);
        $subLinks = $mainLink->getPages();

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainLink' => $mainLink
        ]);
    }
}
