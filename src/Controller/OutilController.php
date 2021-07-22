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
    *@Route("/admin/addOutil", name="addOutil")
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
     * @Route("/admin/listeOutil", name="listeOutil")
     */
    public function listOutil(OutilRepository $repository)
    {
        $outils=$repository->findAll();

        return $this->render('outil/listeOutil.html.twig',[
            'outils'=>$outils
        ]);
    }

    /**
     * @Route("/admin/modifOutil/{id}", name="modifOutil")
     */
    public function modifOutil(Outil $outil, Request $request, EntityManagerInterface $manager)
    {
        // lorsqu'un id est transité dans l'URL et une entité est injecté en dependance, symfony instancie automatiquement l'objet entité et le rempli avec ses données en BDD. Pas besoin d'utiliser la méthode Find($id) du repository

        $form=$this->createForm(OutilType::class, $outil);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($outil);
            $manager->flush();

            $this->addFlash('success', 'L\'outil à bien été modifié');
            return $this->redirectToRoute('listeOutil');
        endif;

        return $this->render('outil/modifOutil.html.twig',[
            'form'=>$form->createView(),
            'outil'=>$outil
        ]);
    }

    /**
     * @Route("/admin/deleteOutil/{id}", name="deleteOutil")
     */
    public function deleteOutil(Outil $outil, EntityManagerInterface $manager)
    {
        $manager->remove($outil);
        $manager->flush();
        $this->addFlash('success', 'L\outil à bien été supprimé');
        return $this->redirectToRoute('listeOutil');
    }
}
