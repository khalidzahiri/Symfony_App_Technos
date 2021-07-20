<?php

namespace App\Controller;

use App\Entity\Techno;
use App\Form\TechnoType;
use App\Repository\ArticleRepository;
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

        $form = $this->createForm(TechnoType::class, $techno);// Ici on instancie un objet form qui va controler automatiquement la correspondance des champs de formulaire (contenus dans articleType) avec l'entité Article (contenu dans $article).

        $form->handleRequest($request); // la  methode handleRequest() de Form nous permet de preparer la requete et remplir notre Objet Article instancié

        if ($form->isSubmitted() && $form->isValid()): // si le formulaire a ete soumis et qu'il est valide (boolean de correspondance genere dans le createForm)
            //$techno->setCreateAt(new \DateTime('now'));

            $manager->persist($techno); //le manager de symfony fait le lien entre l'entité et la BDD vie l'ORM (Object Relationnel MApping) Doctrine. Grace a la methode persist(), il conserve en memoire la requete preparée.
            $manager->flush(); // ici la methode flush() execute les requete en memoire

            $this->addFlash('success', 'L\'article à bien été ajouté');
            return $this->redirectToRoute('listeTechno');

        endif;

        return $this->render('back/addTechno.html.twig',[
            'form'=>$form->createView(),
            'techno'=> $techno
        ]);
    }

    /**
     * @Route("/listeTechno", name="listeTechno")
     */
    public function listeTechno(TechnoRepository $repository)
    {
        $technos=$repository->findAll();

        return $this->render('techno/listeTechno.html.twig',[
            'technos'=>$technos
        ]);
    }
}
