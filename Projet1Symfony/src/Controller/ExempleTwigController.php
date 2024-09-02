<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExempleTwigController extends AbstractController
{
    #[Route('/exemple/twig', name: 'app_exemple_twig')] // name = alias pour ne pas devoir écrire la route
    public function index(): Response
    {
        return $this->render('exemple_twig/index.html.twig', [ // nom de méthode = nom fichier twig
            'controller_name' => 'ExempleTwigController',
        ]);
    }

    #[Route('/frites')]
    public function frites(): Response{
        $sauce = "Brasil";
        $sel = "Non";

        $vars = [
            'sauce' => $sauce,
            'sel' => $sel
        ];

        return $this->render('frites/frites.html.twig', $vars);
    }

    #[Route('/personne')]
    public function personneShow(): Response{
        $personne = [
            'nom' => 'Lancelot',
            'hobby' => 'Chasser les sauterelles',
        ];

        $status = 'employé';

        $vars = [
            'personne' => $personne,
            'status' => $status,
        ];

        return $this->render('personne_show/personne_show.html.twig', $vars);
    }

    #[Route('/coucou', name: 'app_coucou')]
    public function coucou(): Response
    {
        return $this->render('coucou/coucou.html.twig', [
            'controller_name' => 'CoucouController',
        ]);
    }
}
