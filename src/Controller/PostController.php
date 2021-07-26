<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Continent;
use App\Entity\User;
use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CommentFormType;
use App\Form\PostType;
use App\Repository\CommentRepository;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

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
    public function index(PostRepository $postR): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $postR->findAll(),
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
    public function detail(Post $post,User $user, Request $request, CommentRepository $commentRepository)
    {
        // dump($post);
        // dd($commentRepository->findBy(['post'=>$post]));
        
        $comments= $commentRepository->findBy(['post'=>$post], ['id'=>'DESC']);

        $newComment = new Comment();
        $form = $this->createForm(CommentFormType::class, $newComment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // after the form is submitted 
          
            // Only connected users can comment
            $this->denyAccessUnlessGranted('ROLE_USER', $user, 'Accès refusé - Zone protégée');
           
            // we fetch user_id and post_id
            $newComment->setUser($user);
            $newComment->setPost($post);
            
            // we can save our data
            $em = $this->getDoctrine()->getManager();
            $em->persist($newComment);
            $em->flush();

            // We redirect to the post
            return $this->redirectToRoute('blog_post', ['id'=> $post->getId()] );
        }

        return $this->render('post/post.html.twig', [
            "title" => $post->getTitle(),
            "comments" => $comments,
            "commentForm" => $form->createView(),
            "post"=>$post,
        ]);

    }

    /**
     * Method for adding a new post
     * 
     * @Route("/post/user/{id}/add", name="add")
     * 
     */
    public function addPost(Request $request, User $user, SluggerInterface $slugger)
    {
        //dd($user);

        // only members registrated and online can add a new post
        $this->denyAccessUnlessGranted('ROLE_USER', $user);
        
        $newPost = new Post();

        $form = $this->createForm(PostType::class, $newPost);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()){

                // manage Downloading picturefile
                /** @var UploadedFile $picture */
                $picture = $form->get('picture')->getData();

                // this condition to change original file's name
                if ($picture){
                    //we get the name's file
                    $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

                    //we 'clean' the file name with service SluggerInterface (delete specials caracters,..)
                    $safeFilename = $slugger->slug($originalFilename);

                    //we create a unique name 
                    $fileName = $safeFilename . '-' . uniqid() . '.' . $picture->guessExtension();

                    //we transfer the picture to public file with 
                    try{
                        $picture->move(

                            // file where downloading 
                            'img/',
                            $fileName
                        );
                    } catch (FileException $e) {
                        $this->addFlash("warning", "Une erreur est survenue ");
                    }

                }
                    $newPost->setPicture($fileName);


            $newPost->setUser($user);
            $em= $this->getDoctrine()->getManager();
            $em->persist($newPost);
            $em->flush();

            return $this->redirectToRoute('blog_posts');
        }

        //if not ok it returns to the add post from
        return $this->render('post/add.html.twig', [
            'formPostAdd' => $form->createView(),
            'user' =>$user,
        ]);
    }
}