<?php

namespace App\DataFixtures;

use App\Entity\Continent;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create('fr_FR');

        // create 20 characters! Bam!
        $userList = [];
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail($faker->freeEmail());
            if($i === 1)
                $user->setRoles(['ROLE_ADMIN']);
            else
                $user->setRoles(['ROLE_USER']);
            $user->setPassword($faker->password());
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setNickname($faker->userName());
            $user->setPicture($faker->imageUrl());
            $user->setCountry($faker->country());
            $user->setDateOfBirth($faker->date($format = 'Y-m-d',$min = '1950', $max = '2015'))
            $userList[] = $user;
            $manager->persist($user);
        }
        $userListTotal = count($userList);

        $manager->flush();
    }
}
