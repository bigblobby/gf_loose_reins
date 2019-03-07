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
     * @Route("/cabins/{slug}", name="app_default_cabins", defaults={"slug": ""})
     */
    public function cabinsPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'cabins']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }


    /**
     * @Route("/lodges/{slug}", name="app_default_lodges", defaults={"slug": ""})
     */
    public function lodgesPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'lodges']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }

    /**
     * @Route("/loose-reins-country/{slug}", name="app_default_loose_reins_country", defaults={"slug": ""})
     */
    public function looseReinsCountryPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'loose-reins-country']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }

    /**
     * @Route("/out-and-about/{slug}", name="app_default_out_and_about", defaults={"slug": ""})
     */
    public function outAndAboutPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'out-and-about']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }

    /**
     * @Route("/pantry/{slug}", name="app_default_pantry", defaults={"slug": ""})
     */
    public function pantryPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'pantry']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }

    /**
     * @Route("/loose-talk/{slug}", name="app_default_loose_talk", defaults={"slug": ""})
     */
    public function looseTalkPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'loose-talk']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }

    /**
     * @Route("/reviews/{slug}", name="app_default_reviews", defaults={"slug": ""})
     */
    public function reviewsPageAction(EntityManagerInterface $em, $slug)
    {
        // Links for main navigation
        $mainPages = $em->getRepository(MainPage::class)->findAll();

        // Get the one main link, then find all of its sub links
        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'reviews']);
        $subLinks = $mainPage->getPages();

        // If sub link is clicked
        if($slug){
            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
            return $this->render('default/page.html.twig', [
                'mainPages' => $mainPages,
                'subLinks' => $subLinks,
                'subPage' => $subPage
            ]);
        }

        return $this->render('default/main-page.html.twig', [
            'mainPages' => $mainPages,
            'subLinks' => $subLinks,
            'mainPage' => $mainPage
        ]);
    }

//    /**
//     * @Route("/{slug}", name="app_default_interim_page")
//     */
//    public function interimPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainLink = $em->getRepository(MainPage::class)->findOneBy(['slug' => $slug]);
//        $subLinks = $mainLink->getPages();
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subLinks' => $subLinks,
//            'mainLink' => $mainLink
//        ]);
//    }
}
