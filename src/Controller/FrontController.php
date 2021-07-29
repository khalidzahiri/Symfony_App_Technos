<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\TechnoRepository;
use App\Repository\TutorielRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(TechnoRepository $technoRepository)
    {
        $technos=$technoRepository->findBy(array('domaine'=>'Front'), array("id"=>'ASC'), 3);
        return $this->render('front/home.html.twig',[
            'technos'=>$technos
        ]);
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
     * @Route("/prafile", name="profile")
     */
    public function profile(UserRepository $userRepository, TutorielRepository $tutorielRepository)
    {
        $notmine=false;

        $user = $this->getUser();
        $idFavoris= $this->getUser()->getTutoFavoris();
        //dd($idFavoris);
        if ($idFavoris != []):
            foreach ($idFavoris as $idFavori):
                $favoris[]=$tutorielRepository->find($idFavori);
            endforeach;
        else:
            $favoris=false;
        endif;
        return $this->render('front/profile.html.twig',[
            'user'=>$user,
            'favoris'=>$favoris,
            'notmine'=>$notmine
        ]);
    }

    /**
     * @Route("/otherProfile/{userName}", name="otherProfile")
     */
    public function otherProfile(UserRepository $userRepository, $userName ,TutorielRepository $tutorielRepository)
    {
        $notmine=true;
        $user=$userRepository->findOneBy(['username'=>$userName]);
        $idFavoris= $user->getTutoFavoris();
        if ($idFavoris != []):
            foreach ($idFavoris as $idFavori):
                $favoris[]=$tutorielRepository->find($idFavori);
            endforeach;
        else:
            $favoris=false;
        endif;
        return $this->render('front/profile.html.twig',[
            'user'=>$user,
            'favoris'=>$favoris,
            'notmine'=>$notmine
        ]);
    }

    /**
     * @Route("/searchRender", name="searchRender")
     */
    public function search(TechnoRepository $technoRepository, Request $request, SessionInterface $session)
    {
        $session->set('techno', "");
        $search= $request->query->get('search');

        $techno=$technoRepository->search($search);

        $session->set('techno', $techno);
        $techno=$session->get('techno');

        return $this->render('front/front.html.twig',[
            'technos'=>$techno
        ]);
    }

    /**
     * @Route("/infoLegales", name="infoLegales")
     */
    public function infoLegales()
    {
        return $this->render('front/infoLegales.html.twig');
    }
}
