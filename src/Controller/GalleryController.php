<?php

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
    /**
     * @Route("/gallery", name="app_gallery")
     */
    public function index(MediaRepository $repository)
    {
        $images = $repository->findAll();

        return $this->render('gallery/index.html.twig', [
            'images' => $images
        ]);
    }
}
