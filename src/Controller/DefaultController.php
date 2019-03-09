<?php

namespace App\Controller;

use App\Entity\Homepage;
use App\Entity\MainPage;
use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

// @TODO the two 'render' methods could be one, need to change
class DefaultController extends AbstractController
{
    /**
     * @Route("/{mainSlug}/{slug}", name="app_default_page", defaults={"slug": ""})
     */
    public function pageAction(EntityManagerInterface $em, $mainSlug, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => $mainSlug]);
        $subPages = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subPages' => $subPages,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subPages' => $subPages,
            'mainPage' => $mainPage
        ]);
    }
}
