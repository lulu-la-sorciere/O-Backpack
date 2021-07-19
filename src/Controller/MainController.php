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
     * @Route("", name="home")
     *
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('main/index.html.twig', [
            'title' => 'Accueil',
        ]);
    }

    /**
     * 
     * @Route("team", name="team")
     *
     * @return void
     */
    public function team()
    {
        return $this->render('main/team.html.twig',[
            'title' => 'Team',
        ]);
    }
}
