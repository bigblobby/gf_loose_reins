<?php

namespace App\Controller;

use App\Entity\Navigation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ExtraController extends AbstractController
{
    public function extra(EntityManagerInterface $em ,$id)
    {
        $nav = $em->getRepository(Navigation::class)->findOneBy(['id' => $id]);

        if(!$nav) throw $this->createNotFoundException('No navigation exists');

        return $this->render('extra/index.html.twig', [
            'nav' => $nav
        ]);
    }
}
