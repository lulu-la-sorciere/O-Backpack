<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Entity\Country;
use App\Repository\ContinentRepository;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="location_", requirements={"id" = "\d+"})
 */
class LocationController extends AbstractController
{
    /**
     * @Route("continent", name="continent")
     */
    public function index(ContinentRepository $continentRepository): Response
    {

        return $this->render('location/index.html.twig', [
            'location_continent' => $continentRepository->findAll(),
        ]);
    }

    /**
     * @Route("continent/{id}", name="detail")
     *
     */
    public function detail(Continent $continent){
         
        return $this->render('location/countries.html.twig',[
            'continent' => $continent,
            'countries'=>$continent->getCountries(),
        ]);
    }
    /**
     * List of countries according to continent
     * 
     * @Route("country", name="country")
     */
    public function show(CountryRepository $country): Response
    {
        return $this->render('location/country.html.twig', [
            'country' => $country
        ]);
    }
}