<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\Stuff;
use App\Repository\ContinentRepository;
use App\Repository\CountryRepository;
use App\Repository\StuffRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="location_", requirements={"id" = "\d+"})
 */
class LocationController extends AbstractController
{
    /**
     * Method to display the list of continents
     * @Route("continent", name="continent")
     */
    public function index(ContinentRepository $continentRepository): Response
    {

        return $this->render('location/index.html.twig', [
            'location_continent' => $continentRepository->findAll(),
        ]);
    }

    /**
     * Method for display the countries list by continent
     * @Route("continent/{id}", name="detail")
     *
     */
    public function detail(Continent $continent)
    {
        return $this->render('location/countries.html.twig', [
            'continent' => $continent,
            'countries' => $continent->getCountries(),
        ]);
    }

    /**
     * Country's details
     * 
     * @Route("country/{id}", name="country")
     */
    public function show(Country $country): Response
    {
        //dd($country);
        return $this->render('location/country.html.twig', [
            'country' => $country
        ]);
    }

    /**
     * Method for administration administrative information
     * @Route("country/{id}/administratif", name="country_administratif")
     * 
     */
    public function countryAdministratif(Country $country)
    {

        //dump('route ok');
        return $this->render('location/administratif.html.twig', [
            'country' => $country,
        ]);
    }

    /**
     * Current weather for the selected Country
     * @Route("country/{id}/weather", name="country_weather")
     * 
     */
    public function countryWeather(Country $country)
    {

        //dump('route ok');
       
        return $this->render('location/weather.html.twig', [
            'country' => $country,
        ]);
    }
    
    /**
     * List of materials to be provided
     * @Route("country/{id}/stuff", name="country_stuff")
     *
     * @return void
     */
    public function countryStuff(Country $country, StuffRepository $stuffRepository)
    {
       
        
        $stuffs = $stuffRepository->findAll();
        
        
        return $this->render('location/stuff.html.twig', [
            "country" => $country,
            "stuffs" => $stuffs,
        ]);
    }
}
