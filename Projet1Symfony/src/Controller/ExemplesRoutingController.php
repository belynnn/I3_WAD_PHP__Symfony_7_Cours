<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExemplesRoutingController extends AbstractController {

    // route sans paramètres
    #[Route('/exemples/routing/accueil', name:'accueil')]
    public function afficherMessageAccueil (){
        return new Response("Mais enfin je fais quelque chose! Accueil");
    }

    // route ayant des paramètres
    #[Route('/exemples/routing/afficher/contact/{nom}/{profession}', name:'accueilNomProfession')]
    public function afficherContact (Request $request){
        $nom = $request->get('nom');
        $profession = $request->get('profession');
        return new Response("Bienvenue " . $nom . ", " . $profession);
    }


}
