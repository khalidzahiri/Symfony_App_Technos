<?php

namespace App\Controller;

use App\Entity\CategorieTips;
use App\Form\CategorieTipsType;
use App\Repository\CategorieTipsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieTipsController extends AbstractController
{
    /**
     *@Route("/addCategorieTips", name="addCategorieTips")
     */
    public function CategorieTips(EntityManagerInterface $manager, Request $request)
    {
        $categorieTips=new CategorieTips();

        $form=$this->createForm(CategorieTipsType::class, $categorieTips);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($categorieTips);
            $manager->flush();
            $this->addFlash('success', 'La categorie à bien été ajouté');
            return $this->redirectToRoute('listCategorieTips');

        endif;
        return $this->render('back/addCategorieTips.html.twig',[
            'form'=>$form->createView(),
            'categorieTips'=> $categorieTips
        ]);
    }
    /**
     * @Route("/listCategorieTips", name="listCategorieTips")
     */
    public function listCategorieTips(CategorieTipsRepository $repository)
    {
        $categorieTips=$repository->findAll();

        return $this->render('categorie_tips/listeCategorieTips.html.twig',[
            'categorieTips'=>$categorieTips
        ]);
    }

}
