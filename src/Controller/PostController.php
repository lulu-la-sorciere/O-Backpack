<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/blog", name="blog_", requirements={"id" = "\d+"})
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'index' => 'Post',
        ]);
    }

    /**
     * @Route("/list", name="list")
     */
    public function list()
    {

        return $this->render('post/articleslist.html.twig', [
            'listeArticles' => 'listeArticles',
        ]);
    }
}
