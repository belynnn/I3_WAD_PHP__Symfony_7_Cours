<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExerciceIfTwigController extends AbstractController
{
    #[Route('/exercice_if_twig/{prix}')]
    public function aaa(Request $req): Response
    {
        $prix = $req->get('prix');

        $vars = [
            'prix' => $prix,
        ];

        return $this->render('exercice_if_twig/exercice_if_twig.html.twig', $vars);
    }
}