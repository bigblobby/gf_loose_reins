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
//    /**
//     * @Route("/cabins/{slug}", name="app_default_cabins", defaults={"slug": ""})
//     */
//    public function cabinsPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'cabins']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }

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


//    /**
//     * @Route("/lodges/{slug}", name="app_default_lodges", defaults={"slug": ""})
//     */
//    public function lodgesPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'lodges']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }
//
//    /**
//     * @Route("/loose-reins-country/{slug}", name="app_default_loose_reins_country", defaults={"slug": ""})
//     */
//    public function looseReinsCountryPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'loose-reins-country']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }
//
//    /**
//     * @Route("/out-and-about/{slug}", name="app_default_out_and_about", defaults={"slug": ""})
//     */
//    public function outAndAboutPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'out-and-about']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }
//
//    /**
//     * @Route("/pantry/{slug}", name="app_default_pantry", defaults={"slug": ""})
//     */
//    public function pantryPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'pantry']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }
//
//    /**
//     * @Route("/loose-talk/{slug}", name="app_default_loose_talk", defaults={"slug": ""})
//     */
//    public function looseTalkPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'loose-talk']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }
//
//    /**
//     * @Route("/reviews/{slug}", name="app_default_reviews", defaults={"slug": ""})
//     */
//    public function reviewsPageAction(EntityManagerInterface $em, $slug)
//    {
//        // Links for main navigation
//        $mainPages = $em->getRepository(MainPage::class)->findAll();
//
//        // Get the one main link, then find all of its sub links
//        $mainPage = $em->getRepository(MainPage::class)->findOneBy(['slug' => 'reviews']);
//        $subPages = $mainPage->getPages();
//
//        // If sub link is clicked
//        if($slug){
//            $subPage = $em->getRepository(Page::class)->findOneBy(['slug' => $slug]);
//            return $this->render('default/page.html.twig', [
//                'mainPages' => $mainPages,
//                'subPages' => $subPages,
//                'subPage' => $subPage
//            ]);
//        }
//
//        return $this->render('default/main-page.html.twig', [
//            'mainPages' => $mainPages,
//            'subPages' => $subPages,
//            'mainPage' => $mainPage
//        ]);
//    }
}
