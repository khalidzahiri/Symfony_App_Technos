<?php

namespace App\Controller;

use App\Entity\Techno;
use App\Form\TechnoType;
use App\Repository\TechnoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TechnoController extends AbstractController
{
    /**
     * @Route("/addTechno", name="addTechno")
     */
    public function addTechno(Request $request, EntityManagerInterface $manager)
    {

        $techno = new Techno();// Ici on instancie un nouvel objet Article vide que l'on va charger avec les données du formulaire

        $form = $this->createForm(TechnoType::class, $techno, array('ajout'=>true));// Ici on instancie un objet form qui va controler automatiquement la correspondance des champs de formulaire (contenus dans articleType) avec l'entité Article (contenu dans $article).

        $form->handleRequest($request); // la  methode handleRequest() de Form nous permet de preparer la requete et remplir notre Objet Article instancié

        if ($form->isSubmitted() && $form->isValid()): // si le formulaire a ete soumis et qu'il est valide (boolean de correspondance genere dans le createForm)
            //$techno->setCreateAt(new \DateTime('now'));

            $manager->persist($techno); //le manager de symfony fait le lien entre l'entité et la BDD vie l'ORM (Object Relationnel MApping) Doctrine. Grace a la methode persist(), il conserve en memoire la requete preparée.
            $manager->flush(); // ici la methode flush() execute les requete en memoire

            $this->addFlash('success', 'La technologie à bien été ajouté');
            return $this->redirectToRoute('listeTechno');

        endif;

        return $this->render('techno/addTechno.html.twig',[
            'form'=>$form->createView(),
            'techno'=> $techno
        ]);
    }

    /**
     * @Route("/admin/listeTechno", name="listeTechno")
     */
    public function listeTechno(TechnoRepository $repository)
    {
        $technos=$repository->findAll();

        return $this->render('techno/listeTechno.html.twig',[
            'technos'=>$technos
        ]);
    }

    /**
     * @Route("/admin/modifTechno/{id}", name="modifTechno")
     */
    public function modifTechno(Techno $techno, Request $request, EntityManagerInterface $manager)
    {
        // lorsqu'un id est transité dans l'URL et une entité est injecté en dependance, symfony instancie automatiquement l'objet entité et le rempli avec ses données en BDD. Pas besoin d'utiliser la méthode Find($id) du repository

        $form=$this->createForm(TechnoType::class, $techno);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()):
            $manager->persist($techno);
            $manager->flush();

            $this->addFlash('success', 'La technologies à bien été modifié');
            return $this->redirectToRoute('listeTechno');
        endif;

        return $this->render('back/modifTechno.html.twig',[
            'form'=>$form->createView(),
            'techno'=>$techno
        ]);
    }

    /**
     * @Route("/admin/deleteTechno/{id}", name="deleteTechno")
     */
    public function deleteTechno(Techno $techno, EntityManagerInterface $manager)
    {
        $manager->remove($techno);
        $manager->flush();
        $this->addFlash('success', 'La technologie à bien été supprimé');
        return $this->redirectToRoute('listeTechno');
    }
}

