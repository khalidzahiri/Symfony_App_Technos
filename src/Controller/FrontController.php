<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\TechnoRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home() //on injecte en dependance le repository Article pour pouvoir heriter des methodes presente dedans
    {

        return $this->render('front/home.html.twig');
    }
    /**
     * @Route("/front", name="front")
     */
    public function front(TechnoRepository $technoRepository) //on injecte en dependance le repository Techno pour pouvoir heriter des methodes presente dedans
    {
        $techno= $technoRepository->findBy(['domaine'=>'front']);

        return $this->render('front/front.html.twig',[
            'technos'=>$techno
        ]);
    }


    /**
     * @Route("/back", name="back")
     */
    public function back(TechnoRepository $technoRepository) //on injecte en dependance le repository Techno pour pouvoir heriter des methodes presente dedans
    {
        $techno= $technoRepository->findBy(['domaine'=>'back']);

        return $this->render('front/back.html.twig',[
            'technos'=>$techno
        ]);
    }

    /**
     * @Route("/parcours", name="parcours")
     */
    public function parcours()
    {

        return $this->render('front/choix-parcour.html.twig');
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        return $this->render('front/profile.html.twig');
    }

}
