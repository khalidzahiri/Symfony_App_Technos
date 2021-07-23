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
     *@Route("/admin/addCategorieTips", name="addCategorieTips")
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
     * @Route("/admin/listCategorieTips", name="listCategorieTips")
     */
    public function listCategorieTips(CategorieTipsRepository $repository)
    {
        $categorieTips=$repository->findAll();

        return $this->render('categorie_tips/listeCategorieTips.html.twig',[
            'categorieTips'=>$categorieTips
        ]);
    }

    /**
     * @Route("/admin/modifCategorieTips/{id}", name="modifCategorieTips")
     */
    public function modifCategorieTips(CategorieTips $categorieTips, Request $request, EntityManagerInterface $manager)
    {
        // lorsqu'un id est transité dans l'URL et une entité est injecté en dependance, symfony instancie automatiquement l'objet entité et le rempli avec ses données en BDD. Pas besoin d'utiliser la méthode Find($id) du repository

        $form=$this->createForm(CategorieTipsType::class, $categorieTips);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($categorieTips);
            $manager->flush();

            $this->addFlash('success', 'La catégorie à bien été modifié');
            return $this->redirectToRoute('listCategorieTips');
        endif;

        return $this->render('categorie_tips/modifCategorieTips.html.twig',[
            'form'=>$form->createView(),
            'categorieTips'=>$categorieTips
        ]);
    }

    /**
     * @Route("/admin/deleteCategorieTips/{id}", name="deleteCategorieTips")
     */
    public function deleteCategorieTips(CategorieTips $categorieTips, EntityManagerInterface $manager)
    {
        $manager->remove($categorieTips);
        $manager->flush();
        $this->addFlash('success', 'La catégorie à bien été supprimé');
        return $this->redirectToRoute('listCategorieTips');
    }

}
