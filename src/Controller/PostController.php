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
     * @Route("/", name="list")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'index' => 'Post',
        ]);
    }

    
}
