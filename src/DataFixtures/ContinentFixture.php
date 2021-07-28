<?php

namespace App\DataFixtures;

use App\Entity\Continent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ContinentFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        
        // create 6 continents !
        $continentList = [];
        for ($i = 0; $i < 6; $i++) {
            $continent = new Continent();
            $continent->setName($faker->state());
            $continentList[] = $continent;
            $manager->persist($continent);
        }
        $continentListTotal = count($continentList);

    }
}
