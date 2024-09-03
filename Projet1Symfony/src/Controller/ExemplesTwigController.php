<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExemplesTwigController extends AbstractController
{
    #[Route('/exemples/twig', name: 'app_exemples_twig')]
    public function index(): Response
    {
        return $this->render('exemples_twig/index.html.twig');
    }


    #[Route('/exemples/frites')]
    public function frites():Response{

        // générer de données qui seront passées à la vue
        $sauce = "samourai";
        $sel = "oui";

        $vars = ['sauce' => $sauce,
                'sel' => $sel];

        return $this->render ('exemples_twig/frites.html.twig', $vars);
    }

    #[Route ('/exemples/personne')]
    public function personneShow ():Response {
        $personne = ['nom' => 'Louise',
                    'hobby' => 'piloter'];
        
        $status = "employé";

        // envoyer un array à la vue ($personne)
        $vars = ['personne' => $personne,
                'status' => $status];
        
        return $this->render ('exemples_twig/personne_show.html.twig', $vars);

        //// array index
        $marques = ['Audi', 'Renault', 'BMW'];
        $vars = ['marques' => $marques];

    }

    // exercice
    #[Route ('exo/tva/{prix}/{tauxTva}')]
    public function exoTva (Request $req){
        $prix = $req->get ('prix');
        $tauxTva = $req->get ('tauxTva');
        $prixTvac = $prix *  (1 + $tauxTva /100);

        $vars = ['prixTvac' => $prixTvac];

        return $this->render ('exemples_twig/exo_tva.html.twig', $vars);

    }

    // exercice 
    #[Route ('exo/villes/{langue}')]
    public function exoVillesLangue (Request $req){
        $langue = $req->get('langue');

        $villes = [];
        if ($langue === 'FR'){
            $villes = ['Bruxelles','Gent','Anvers'];
        }
        else if ($langue === 'NL'){
            $villes = ['Brussels','Gent','Antwerpen'];
        }
        $vars = ['villes' => $villes];
        return $this->render ('exemples_twig/exo_villes_langue.html.twig', $vars);
    }

    #[Route ('exo/param/villes/{langue}/{annee}')]
    public function exoParamVillesLangue (string $langue, int $annee){

        $villes = [];
        if ($langue === 'FR'){
            $villes = ['Bruxelles','Gent','Anvers'];
        }
        else if ($langue === 'NL'){
            $villes = ['Brussels','Gent','Antwerpen'];
        }
        $vars = ['villes' => $villes,
                'annee' => $annee];
        return $this->render ('exemples_twig/exo_param_villes_langue.html.twig', $vars);
    }


    #[Route ('exo/date')]
    public function exoDate (){
        $uneDate = new \DateTime();
        
        // si besoin de debug....
        // dump ("lalalalL LALALLALALLALALAL");
        // dump ($uneDate);
        // dump ("cococococ");
        // dd();

        $vars = ['uneDate' => $uneDate ];

        return $this->render ('exemples_twig/exo_date.html.twig', $vars);


    }

    #[Route ('exo/if/{prix}')]
    public function exoIf (int $prix){
        $prixDouble = $prix * 2;
        $vars = ['prixDouble' => $prixDouble];

        return $this->render ('exemples_twig/exo_if.html.twig', $vars);

    }


}
