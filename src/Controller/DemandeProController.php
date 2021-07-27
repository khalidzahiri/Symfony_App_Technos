<?php

namespace App\Controller;

use App\Entity\DemandePro;
use App\Entity\User;
use App\Repository\DemandeProRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DemandeProController extends AbstractController
{

    /**
     * @Route("/demandePro", name="demandePro")
     */
    public function demandePro()
    {
            return $this->render('demandePro/addDemandePro.html.twig');
    }

    /**
     * @Route("/addDemandePro", name="addDemandePro")
     */
    public function addDemandePro(Request $request, UserInterface $userInterface, EntityManagerInterface $manager, UserRepository $userRepository)
    {
        if ($_POST):
            $demande = new DemandePro();

            $idUser=$this->getUser()->getId();

            $message=$request->request->get('message');
            $demande->setIdUser($idUser);
            $demande->setMessage($message);
            $manager->persist($demande);
            $manager->flush();
            $this->addFlash('success', 'La demande de statut "pro" à bien été effectué');
            return $this->redirectToRoute('profile');
        endif;
    }

    /**
     * @Route("/admin/listeDemandePro", name="listeDemandePro")
     */
    public function listeDemandePro(DemandeProRepository $repository)
    {
        $demandes=$repository->findAll();

        return $this->render('demandePro/listeDemandePro.html.twig',[
            'demandes'=>$demandes
        ]);
    }

    /**
     * @Route("/admin/choixRole/{id}", name="choixRole")
     */
    public function choixRole(User $user)
    {

        return $this->render('demandePro/choixRole.html.twig',[
            "user"=>$user
        ]);
    }

    /**
     * @Route("/admin/modifRole/{id}", name="modifRole")
     */
    public function modifRole(User $user, Request $request, EntityManagerInterface $manager, DemandeProRepository $demandeProRepository)
    {
        // lorsqu'un id est transité dans l'URL et une entité est injecté en dependance, symfony instancie automatiquement l'objet entité et le rempli avec ses données en BDD. Pas besoin d'utiliser la méthode Find($id) du repository

        if ($_POST):
            $role=$request->request->get('roles');
            $idUser=$user->getId();
            $demandes = $demandeProRepository->findBy(['idUser'=>$idUser]);
            $user->setRoles([$role]);
            foreach ($demandes as $demande):
                $manager->remove($demande);
            endforeach;
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('listeDemandePro');
        endif;
    }


    /**
     * @Route("/admin/deleteDemande/{id}", name="deleteDemande")
     */
    public function deleteDemande(DemandePro $demandePro, EntityManagerInterface $manager) // function de suppression de demande suite a un refus de changement
    {
        $manager->remove($demandePro);
        $manager->flush();
        $this->addFlash('success', 'La demande de statut a bien été supprimée');
        return $this->redirectToRoute('listeDemandePro');
    }

}
