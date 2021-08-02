<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture 
{

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // create 20 user!
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
            $user->setCountry($faker->country());
            $user->setDateOfBirth($faker->dateTimeThisCentury($max = 'now', $timezone = null));
            $userList[] = $user;
            $manager->persist($user);
        }
        $userListTotal = count($userList);


         // create comments !
         $commentList = [];
         for ($i = 0; $i < 20; $i++) {
             $comment = new Comment();
             $comment->setContent($faker->text());
             $commentList[] = $comment;
             $manager->persist($comment);
         }
         $commentListTotal = count($commentList);

           $width = '300px';
           $height = '200px';

            // create post!
            $postList = [];
            for ($i = 0; $i < 20; $i++) {
                $post = new Post();
                $post->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true));
                $post->setContent($faker->text());
                $post->setCreatedAt($faker->dateTime($max='now'));
                $post->setUpdatedAt($faker->dateTime($max='now'));
                $post->setPublishedAt($faker->dateTime($max='now'));
                $post->setUser($user);
                $postList[] = $post;
                $manager->persist($post);
            }
            $postListTotal = count($postList);



        $manager->flush();
    }
}
