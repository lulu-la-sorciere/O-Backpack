<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="main")
 * 
 */
class MainController extends AbstractController
{
    /**
     * @Route("home", name="home")
     *
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('main/index.html.twig', [
            'title' => 'Accueil',
        ]);
    }
}
