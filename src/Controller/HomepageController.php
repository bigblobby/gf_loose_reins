<?php

namespace App\Controller;

use App\Entity\Homepage;
use App\Entity\Navigation;
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
        $homepage = $em->getRepository(Homepage::class)->findOneBy(['title' => 'Homepage']);

        return $this->render('homepage/index.html.twig', [
            'homepage' => $homepage,
        ]);
    }
}
