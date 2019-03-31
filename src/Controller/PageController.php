<?php

namespace App\Controller;

use App\Entity\Navigation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    /**
     * @Route("/before-you-book", name="app_page_before_you_book")
     */
    public function beforeYouBookAction()
    {
        return $this->render('page/before-you-book.html.twig');
    }

    /**
     * @Route("/{mainSlug}/{slug}", name="app_default_page",
     *   requirements={"mainSlug": "cabins|lodges|loose-reins-country|out-and-about|pantry|loose-talk|reviews"},
     *   defaults={"slug": ""}
     * )
     */
    public function pageAction(EntityManagerInterface $em, $mainSlug, $slug)
    {
        // This returns an array of 1 item
        $mainNav = $em->getRepository(Navigation::class)->findBy(['slug' => $mainSlug, 'parent' => null], [], 1);

        $subPages = $mainNav[0]->getNavigations();
        $mainPage = $mainNav[0]->getPage();

        // If sub link is clicked
        if($slug){
            $subNav = $em->getRepository(Navigation::class)->findOneBy(['slug' => $slug]);

            $subPage = $subNav->getPage();

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
