<?php

namespace App\Controller;

use App\Entity\Tips;
use App\Form\TipsType;

use App\Repository\TipsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TipsController extends AbstractController
{

    /**
     *@Route("/addTips", name="addTips")
     */
    public function addTips(EntityManagerInterface $manager, Request $request)
    {
        $tips=new Tips();

        $form=$this->createForm(TipsType::class, $tips);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($tips);
            $manager->flush();
            $this->addFlash('success', 'Le tips à bien été ajouté');
            return $this->redirectToRoute('listTips');

        endif;
        return $this->render('back/addTips.html.twig',[
            'form'=>$form->createView(),
            'tips'=> $tips
        ]);
    }

    /**
     * @Route("/listTips", name="listTips")
     */
    public function listTips(TipsRepository $repository)
    {
        $tips=$repository->findAll();

        return $this->render('tips/listeTips.html.twig',[
            'tips'=>$tips
        ]);
    }
}
