<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Page;
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
        $articles = $em->getRepository(Article::class)->findAllPublishedArticlesOrderedByNewest();

        $page = $em->getRepository(Page::class)->findOneBy(['id' => '6']);

        return $this->render('article/index.html.twig', [
            'page' => $page,
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
