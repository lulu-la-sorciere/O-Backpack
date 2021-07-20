<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="main_")
 * 
 */
class MainController extends AbstractController
{

    /**
     * Method for a page under construction
     * @Route("construction", name="construction")
     *
     * @return void
     */
    public function constructionPage()
    {
        return $this->render('main/constructionPage.html.twig',[
            "title" => "Page en construction",
        ]);
    }

    /**
     * Method to display the 404 error page
     * @Route("error", name="error")
     *
     * @return void
     */
    public function error()
    {
        return $this->render('main/error.html.twig', [
            "title" => "Erreur 404",
        ]);
    }

    /**
     * Method for the Homepage view
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
     * Method for the Team's view
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
