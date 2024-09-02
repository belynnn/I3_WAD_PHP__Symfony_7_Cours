<?php

namespace App\Controller;
// doit spécifier namespace pour éviter fatal (s'embrouille et dit que class existe déjà)

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;     // potentiellement doit être en premier
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
/* merci l'autocomplétion pour le use
    - soit extends abstractCont
    - soit autocomplétion du use classique VSCode
*/

class ExempleRoutingController extends AbstractController{

    #[Route('/exemples/routing/accueil')]
    // attribut php : notation permettant utiliser notation à endroit demandé

    public function aficherMessageAccueil(){
        // on va pas encore toucher aux vues juste pour l'exemple
        return new Response("Ceci est un exemple de réponse juste pour dire qu'on fait quelque chose <3");
    }

    #[Route('/exemples/routing/afficher/contact/{nom}/{profession}')]
    public function afficherContact(Request $request){
        $nom = $request->get('nom');
        $profession = $request->get('profession');
        return new Response("Ah que coucou, $nom lea $profession ...");
    }
}