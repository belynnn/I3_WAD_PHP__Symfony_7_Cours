<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExercicePaysController extends AbstractController
{
    #[Route('/exercice_pays/{lang}', name: 'app_exercice_pays_twig')]
    public function afficherTroisPays(Request $req): Response
    {
        $lang = $req->get('lang');
        
        if($lang === "fr"){
            $countries = "Belgique, France, Espagne";
        } elseif($lang === "nl"){
            $countries = "Belgïe, Frankrijk, Spanje";
        }

        $vars = [
            'countries' => $countries,
        ];

        return $this->render('exercice_pays/afficher_trois_pays.html.twig', $vars);
    }
}