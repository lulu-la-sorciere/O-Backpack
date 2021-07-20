<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig');
    }


    /**
     * @Route("/{id}/member", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, UserPasswordHasherInterface $passwordHasher): Response
    {
        //The member only can change its personnal information in its account
        $this->denyAccessUnlessGranted('USER_EDIT', $user, 'Accès refusé - Zone protégée');
        
        //change password
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // former password
            $plainPassword = $form->get('password')->getData();

            // hashing password
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $plainPassword
            );

            // updating and hashing passwword
            $user->setPassword($hashedPassword);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }
    }

        /**
        * @Route("/users/{id}", name="update-user", requirements={"id"="\d+"}, methods={"POST"})
        *
        * @param UserManager $userManager
        * @param Request $request
        * @param int $id
        * @return Response
        * @throws Exception
        */
        public function update(User $user, Request $request, int $id)
        {
            $form = $this->createForm(UserType::class, $user);

            $form->handleRequest($request);
        
            // when the form is completed
            if ($form->isSubmitted() && $form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
        
            // redirection to member account with updated datas
            return $this->redirectToRoute('get-user', ['id' => $user->getId()]);
        
        


    }
}
