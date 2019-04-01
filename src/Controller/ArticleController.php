<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/loose-talk", name="app_article_index")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        $articles = $em->getRepository(Article::class)->findAllPublishedArticles();

        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/loose-talk/{slug}", name="app_article_post")
     */
    public function postAction(EntityManagerInterface $em, $slug)
    {
        $article = $em->getRepository(Article::class)->findOneBy(['slug' => $slug]);

        return $this->render('article/post.html.twig', [
            'article' => $article
        ]);
    }
}
