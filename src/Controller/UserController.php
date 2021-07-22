<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\MemberDataType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user", name="user_", requirements={"id"="\d+"})
 */
class UserController extends AbstractController
{
    /**
     * @Route("/profile/{id}", name="profile")
     */
    public function index(int $id, UserRepository $userRepository): Response
    {
        //dd($id);
       
        $user = $userRepository->find($id);
       // dd($user);
        return $this->render('user/index.html.twig',[
            "user"=>$user,
        ]);
    }


    /**
     * @Route("/profile/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, UserPasswordHasherInterface $passwordHasher): Response
    {
       // dd('route ok');
        //The member only can change its personnal information in its account
        $this->denyAccessUnlessGranted('ROLE_USER', $user, 'Accès refusé - Zone protégée');
    
        $form = $this->createForm(ChangePasswordType::class, $user);
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
            return $this->redirectToRoute('user_profile', ['id'=>$user->getId()]);
        }
        return $this->render('user/edit.html.twig',[
            "user" => $user,
            "form" => $form->createView(),
            //"alert" => $alert
        ]);
    }

        /**
        * @Route("/profile/{id}/update", name="update-user")
        *
        * @param UserManager $userManager
        * @param Request $request
        * @param int $id
        * @return Response
        * @throws Exception
        */
        public function update(User $user, Request $request, int $id)
        {
            $form = $this->createForm(MemberDataType::class, $user);

            $form->handleRequest($request);
        
            // when the form is completed
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                // redirection to member account with updated datas
                return $this->redirectToRoute('user_profile', ['id'=>$user->getId()]);
            }
        
            return $this->render('user/update.html.twig', [
                "user"=>$user,
                "form" =>$form->createView(),
            ]);
    }
}
