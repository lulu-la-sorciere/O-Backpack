<?php

namespace App\Controller;

use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/blog", name="blog_", requirements={"id" = "\d+"})
 */
class PostController extends AbstractController
{
    /**
     * Method to blog page
     * @Route("/", name="list")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'index' => 'Post',
        ]);
    }

    /**
     * Method to picture gallery
     * @Route("/pictures", name="gallery")
     */
    public function galleryPic(ContinentRepository $continentRepository)
    {

        return $this->render('post/gallery.html.twig', [
            'continents' => $continentRepository->findAll(),
        ]);
    }

    /**
     * Method to continent's pictures
     * @Route("/pictures/{id}", name="continentPic")
     * 
     */
    public function continentPic(Continent $continent)
    {
        return $this->render('post/picbycontinent.html.twig',[
            'continent' => $continent,

        ]);
    }
}
