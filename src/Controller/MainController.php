<?php

namespace App\Controller;

use App\Repository\ContinentRepository;
use App\Repository\CountryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function home(PostRepository $postR): Response
    {
        $posts=$postR->findBy([],['createdAt'=>'DESC'], 3);
       
        return $this->render('main/index.html.twig', [
            'title' => 'Accueil',
            'posts' => $posts,
        ]);
    }

    /**
     * Method for the view of legal notices
     * @Route("legalNotices", name="legalNotices")
     *
     * @return void
     */
    public function legalNotices()
    {
        return $this->render('main/legalNotices.html.twig',[
            'title'=> 'Mentions Légales'
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
        return $this->render('main/team.html.twig', [
            'title' => 'Team',
        ]);
    }

    /**
     * Method to page searching
     * @Route("search", name="search")
     * 
     * @return void
     */
    public function search(Request $request, ContinentRepository $continentRepository, CountryRepository $countryRepository): Response
    {
        // We want to get informations contained on field's form which name is 'query'
        $searchValue = $request->get('search');

        // We make a search in list continent
        $continents = $continentRepository->findSearchByNameQB($searchValue);

        //We Make a search in countries names
        $countries = $countryRepository->findCountryByHisName($searchValue);

        // We display results in vue search.html.twig

            return $this->render('main/search.html.twig', [
                'continents' => $continents,
                'countries' => $countries,
                'searchValue' => $searchValue,
            ]);  
       
    }
}
