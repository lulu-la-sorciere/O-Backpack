<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Continent;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CommentFormType;
use App\Form\PostType;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog", name="blog_", requirements={"id" = "\d+"})
 */
class PostController extends AbstractController
{
    /**
     * Method to blog page
     * 
     * @Route("", name="list")
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
        return $this->render('post/picbycontinent.html.twig', [
            'continent' => $continent,

        ]);
    }

    /**
     * Method to display the list of posts
     * @Route("/post", name="posts")
     *
     * @return void
     */
    public function postsList(PostRepository $postRepository)
    {
        //dd($postRepository);
        $posts = $postRepository->findAll();

        return $this->render('post/postsList.html.twig', [
            "title" => "Articles",
            "posts" => $posts,
        ]);
    }

    /**
     * Method to display the details of a post
     * @Route ("/post/{id}", name="post")
     *
     * @return void
     */
    public function detail(Post $post, Request $request, CommentRepository $commentRepository)
    {
        // dump($post);
        // dd($commentRepository->findBy(['post'=>$post]));

        $comments = $commentRepository->findBy(['post' => $post], ['id' => 'DESC']);

        $newComment = new Comment();
        $form = $this->createForm(CommentFormType::class, $newComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // 6) Après soumission du formulaire, on va pouvoir
            // sauvegarder nos données
            // L'objet catégorie contient les données transmises lors
            // du clic sur le bouton "Valider"
            $em = $this->getDoctrine()->getManager();

            // On sauvegarde la catégorie en BDD
            $em->persist($newComment);
            $em->flush();

            // Message flash
            // $_SESSION['tototiti'] = 'La categorie ...';
            //$this->addFlash('info', 'La catégorie ' . $category->getName() . ' a bien été créée');

            // 7) On redirige vers la liste des catégories
            return $this->redirectToRoute('main_home');
        }

        return $this->render('post/post.html.twig', [
            "title" => $post->getTitle(),
            "comments" => $comments,
            "commentForm" => $form->createView(),
        ]);
    }

    /**
     * Method for adding a new post
     * 
     * @Route("/post/add", name="add")
     * 
     */
    public function addPost(Request $request) : Response
    {
        // only members registrated and online can add a new post
        $this->denyAccessUnlessGranted('ROLE_USER');
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em= $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('blog_posts');
        }
        
        return $this->render('post/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
