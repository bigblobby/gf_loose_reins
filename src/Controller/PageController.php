<?php

namespace App\Controller;

use App\Entity\MainPage;
use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/{mainSlug}/{slug}", name="app_default_page", defaults={"slug": ""})
     */
    public function pageAction(EntityManagerInterface $em, $mainSlug, $slug)
    {
        // Get the one main page, then find all of its sub pages
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => $mainSlug]);
        $subPages = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('page/sub-page.html.twig', [
                'subPages' => $subPages,
                'subPage' => $subPage
            ]);
        }

        return $this->render('page/main-page.html.twig', [
            'subPages' => $subPages,
            'mainPage' => $mainPage
        ]);
    }
}
