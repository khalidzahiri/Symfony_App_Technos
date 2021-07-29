<?php

namespace App\Controller;


use App\Entity\Techno;
use App\Entity\Tutoriel;
use App\Repository\TechnoRepository;
use App\Repository\TutorielRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixController extends AbstractController
{
    /**
     * @Route("/choix/{id}", name="choix")
     */
    public function choix(Techno $techno)
    {
        $tutos=$techno->getTutoriels();

        return $this->render('choix/choix.html.twig',[
            'techno'=>$techno
        ]);
    }

    /**
     * @Route("/addFavoris/{idTuto}/{idTechno}", name="addFavoris")
     */
    public function addFavoris(TutorielRepository $tutorielRepository, TechnoRepository $technoRepository, EntityManagerInterface $manager, UserRepository $userRepository, $idTuto, $idTechno)
    {
        $this->get('session')->getFlashBag()->clear();
        $techno=$technoRepository->find($idTechno);
        $datas = $this->getUser()->getTutofavoris();
        //dd($datas);
        if ($datas!=[]):
            foreach ($datas as $data=>$value):
                if ($value==$idTuto):
                $this->addFlash('error', 'Ce tutoriel a déjà été enregistré sur votre profil');
                return $this->render('choix/choix.html.twig',[
                    'techno'=>$techno,
                    'activeTuto'=>true
                ]);
                else:
                    $notfavoris=true;
                endif;
            endforeach;
        else:
            $notfavoris=true;
        endif;
        if ($notfavoris):
        $datas[] = $idTuto;
        //dd($datas);
        $this->getUser()->setTutofavoris($datas);
        $manager->persist($this->getUser());
        $manager->flush();
        $this->addFlash('success', 'Le tutoriel à bien été enregistré sur votre profil');
        return $this->render('choix/choix.html.twig',[
            'techno'=>$techno,
            'activeTuto'=>true
        ]);
        endif;
    }
}
