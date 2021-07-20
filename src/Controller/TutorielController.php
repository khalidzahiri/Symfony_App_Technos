<?php

namespace App\Controller;

use App\Entity\Techno;
use App\Entity\Tutoriel;
use App\Form\TechnoType;
use App\Form\TutorielType;
use App\Repository\TechnoRepository;
use App\Repository\TutorielRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutorielController extends AbstractController
{
    /**
     * @Route("/addTuto", name="addTuto")
     */
    public function addTuto(Request $request, EntityManagerInterface $manager)
    {

        $tutoriel = new Tutoriel();// Ici on instancie un nouvel objet Article vide que l'on va charger avec les données du formulaire

        $form = $this->createForm(TutorielType::class, $tutoriel);// Ici on instancie un objet form qui va controler automatiquement la correspondance des champs de formulaire (contenus dans articleType) avec l'entité Article (contenu dans $article).

        $form->handleRequest($request); // la  methode handleRequest() de Form nous permet de preparer la requete et remplir notre Objet Article instancié

        if ($form->isSubmitted() && $form->isValid()): // si le formulaire a ete soumis et qu'il est valide (boolean de correspondance genere dans le createForm)
            //$techno->setCreateAt(new \DateTime('now'));

            $manager->persist($tutoriel); //le manager de symfony fait le lien entre l'entité et la BDD vie l'ORM (Object Relationnel MApping) Doctrine. Grace a la methode persist(), il conserve en memoire la requete preparée.
            $manager->flush(); // ici la methode flush() execute les requete en memoire

            $this->addFlash('success', 'Le tutoriel à bien été ajouté');
            return $this->redirectToRoute('listeTuto');

        endif;

        return $this->render('back/addTuto.html.twig',[
            'form'=>$form->createView(),
            'tuto'=> $tutoriel
        ]);
    }

    /**
     * @Route("/listeTuto", name="listeTuto")
     */
    public function listeTuto(TutorielRepository $repository)
    {
        $tutos=$repository->findAll();

        return $this->render('techno/listeTuto.html.twig',[
            'tutos'=>$tutos
        ]);
    }
}
