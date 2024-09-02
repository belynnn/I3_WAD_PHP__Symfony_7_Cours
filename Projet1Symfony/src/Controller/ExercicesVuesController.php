<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExercicesVuesController extends AbstractController
{
    #[Route('exercices/tva/{prix}')]
    public function afficheTvacTwig(Request $req): Response
    {
        $tva = 1.21;
        $prix = $req->get('prix');

        $vars = [
            'tva' => $tva,
            'prix' => $prix];

        return $this->render('exercices_vues/affiche_tva.html.twig', $vars);
    }

    #[Route('exercices/tva2/{prix}')]
    public function afficheTvacEtPrixEtResultat(Request $req): Response
    {
        $tva = 21;
        $prix = $req->get('prix');

        $vars = [
            'tva' => $tva,
            'prix' => $prix
        ];

        return $this->render('exercices_vues/affiche_tva_prix_resultat.html.twig', $vars);
    }
}