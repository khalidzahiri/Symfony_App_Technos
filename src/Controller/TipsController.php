<?php

namespace App\Controller;

use App\Entity\Tips;
use App\Form\TipsType;

use App\Repository\TipsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class TipsController extends AbstractController
{

    /**
     *@Route("/addTips", name="addTips")
     */
    public function addTips(EntityManagerInterface $manager, Request $request, UserInterface $user)
    {
        $tips=new Tips();
        $form=$this->createForm(TipsType::class, $tips);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            $userName= $user->getUsername();
            $tips->setUserName($userName);
            $manager->persist($tips);
            $manager->flush();
            $this->addFlash('success', 'Le tips à bien été ajouté');
            return $this->redirectToRoute('listTips');

        endif;
        return $this->render('tips/addTips.html.twig',[
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

    /**
     * @Route("/admin/modifTips/{id}", name="modifTips")
     */
    public function modifTips(Tips $tips, Request $request, EntityManagerInterface $manager)
    {
        // lorsqu'un id est transité dans l'URL et une entité est injecté en dependance, symfony instancie automatiquement l'objet entité et le rempli avec ses données en BDD. Pas besoin d'utiliser la méthode Find($id) du repository

        $form=$this->createForm(TipsType::class, $tips);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($tips);
            $manager->flush();

            $this->addFlash('success', 'Le tips à bien été modifié');
            return $this->redirectToRoute('listTips');
        endif;

        return $this->render('tips/modifTips.html.twig',[
            'form'=>$form->createView(),
            'tips'=>$tips
        ]);
    }

    /**
     * @Route("/admin/deleteTip/{id}", name="deleteTip")
     */
    public function deleteTip(Tips $tips, EntityManagerInterface $manager)
    {
        $manager->remove($tips);
        $manager->flush();
        $this->addFlash('success', 'Le tips à bien été supprimé');
        return $this->redirectToRoute('listTips');
    }
}
