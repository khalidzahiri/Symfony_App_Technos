<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use function Sodium\add;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function registration(EntityManagerInterface $manager, Request $request, UserPasswordEncoderInterface $encoder) //fonction d'enregistrement de compte
    {
        //UserPasswordEncoderInterface pour pouvoir fonctionner attends l'objet User, que celui ci heirte de la class UserInterface, qui lui attend des méthodes bien spécifiques a implementer afin de s'assurer du bon fonctionnement de l'authentification

        $user=new User();

        $form=$this->createForm(RegistrationType::class, $user, array('ajout'=>true));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):

            $hash=$user->getPassword();
            $hashpassword=$encoder->encodePassword($user, $hash);
            $user->setPassword($hashpassword);
            $photo = $form->get('photo')->getData();

            if ($photo):
                $nomphoto = date('YmdHis').uniqid().$photo->getClientOriginalName();

                $photo->move(
                    $this->getParameter('upload_directory'),
                    $nomphoto
                );

                $user->setPhoto($nomphoto);
            else:
                $user->setPhoto('avatar.png');
            endif;

            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', 'Votre compte à bien été enregistré');
            return $this->redirectToRoute('home');
        endif;

        return $this->render('security/registration.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/modifUser/{id}", name="modifUser")
     */
    public function modifUser(User $user, Request $request, EntityManagerInterface $manager)
    {
        // lorsqu'un id est transité dans l'URL et une entité est injecté en dependance, symfony instancie automatiquement l'objet entité et le rempli avec ses données en BDD. Pas besoin d'utiliser la méthode Find($id) du repository

        $form=$this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):
            $photo = $form->get('photoModif')->getData();

            if ($photo):
                $nomphoto = date('YmdHis').uniqid().$photo->getClientOriginalName();

                $photo->move(
                    $this->getParameter('upload_directory'),
                    $nomphoto
                );
                if ($user->getPhoto()!== null):
                unlink($this->getParameter('upload_directory').'/'.$user->getPhoto());
                endif;
                $user->setPhoto($nomphoto);


            endif;
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', 'Le profil à bien été modifié');
            return $this->redirectToRoute('profile');
            elseif($form->isSubmitted() && !$form->isValid()):
                $this->addFlash('error', 'Une erreur est survenue');
        endif;

        return $this->render('security/modifUser.html.twig',[
            'form'=>$form->createView(),
            'user'=>$user
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login() //fonction de connexion gerée par symfony dans security.yaml
    {

        return $this->render('security/login.html.twig',[
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout() //fonction de deconnexion gerée par symfony dans security.yaml
    {

    }

}
