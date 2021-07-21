<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChoixController extends AbstractController
{
    /**
     * @Route("/choix", name="choix")
     */
    public function choix()
    {

        return $this->render('choix/choix.html.twig');
    }}
