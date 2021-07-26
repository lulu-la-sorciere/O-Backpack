<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Entity\Country;
use App\Repository\ContinentRepository;
use App\Repository\StuffRepository;
use App\Service\CountryRestApi;
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
    public function index(ContinentRepository $continentRepository, CountryRestApi $countryRestApi): Response
    {

       // dd($countryRestApi->getTestData());
        return $this->render('location/index.html.twig', [
            'location_continent' => $continentRepository->findAll(),
            //'datas'=>$countryRestApi->getTestData(),
        ]);
    }

    /**
     * Method for display the countries list by continent
     * @Route("continent/{id}", name="detail")
     *
     */
    public function detail(Continent $continent, CountryRestApi $countryRestApi)
    {
        // dd($countryRestApi->countryByContinent($continent->getName()));


        return $this->render('location/countries.html.twig', [
            'continent' => $continent,
            'countries' => $continent->getCountries(),
            'datas'=>$countryRestApi->countryByContinent($continent->getName()),
        ]);
    }

    /**
     * Country's details
     * 
     * @Route("continent/{id}/country/{name}", name="country")
     */
    public function show(CountryRestApi $countryRestApi, $name, $id): Response
    {
        //dd($name);
       
        
        return $this->render('location/country.html.twig', [
            'country' => $countryRestApi->fetch($name),
            'name'=>$name,
            'id'=>$id
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
    public function countryStuff(Country $country, StuffRepository $stuff)
    {
        $stuffs=$country->getStuff();
        // dd($stuffs);

        return $this->render('location/stuff.html.twig', [
            "country" => $country,
            "stuffs" => $stuffs,
        ]);
    }

}
