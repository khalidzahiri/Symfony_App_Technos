<?php

namespace App\Controller;

use App\Entity\Outil;
use App\Form\OutilType;
use App\Repository\OutilRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OutilController extends AbstractController
{

    /**
    *@Route("/addOutil", name="addOutil")
    */
    public function addOutil(EntityManagerInterface $manager, Request $request)
    {
        $outil=new Outil();

        $form=$this->createForm(OutilType::class, $outil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($outil);
            $manager->flush();
            $this->addFlash('success', 'L\'outil à bien été ajouté');
            return $this->redirectToRoute('listeOutil');

        endif;
                return $this->render('back/addOutil.html.twig',[
                    'form'=>$form->createView(),
                    'outil'=> $outil
                ]);
    }

    /**
     * @Route("/listeOutil", name="listeOutil")
     */
    public function listOutil(OutilRepository $repository)
    {
        $outils=$repository->findAll();

        return $this->render('outil/listeOutil.html.twig',[
            'outils'=>$outils
        ]);
    }


}
