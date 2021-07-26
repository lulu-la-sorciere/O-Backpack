<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class OpenWeather
{
    private $apiUrl ='https://api.openweathermap.org/data/2.5/weather';
    private $key = '1ef9836dabf4760aa8669e14652a1054';
    private $client;

    public function __construct(HttpCLientInterface $client)
    {
        $this->client = $client;
    }
     /**
     * Méthode permettant de retourner les informations (issues d'une API)
     *
     * @param string $city
     * @return Array
     */
    public function fetch($city)
    {
        $response = $this->client->request(
            'GET',
            // https://www.omdbapi.com/?apiKey=83bfb8c6&t=Scrubs
            $this->apiUrl . '&q=' . $city . '&appid=' . $this->key
        );

        // On retourne les informations de la série 
        // sous forme de tableau associatif
        return $response->toArray();
    }
}