<?php

namespace App\Controller;

use App\Entity\Aeroport;
use App\Form\AeroportType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormulairesController extends AbstractController
{
    #[Route('/formulaires', name: 'app_formulaires')]
    public function index(): Response
    {
        return $this->render('formulaires/index.html.twig');
    }

    // AFFICHER LE FORMULAIRE
    #[Route("/formulaires/aeroport/afficher")]
    public function aeroportAfficher(Request $req, ManagerRegistry $doctrine){
        $aeroport = new Aeroport();

        // on crée le formulaire du type souhaité
        $formulaireAeroport = $this->createForm(AeroportType::class, $aeroport);

        $formulaireAeroport->handleRequest($req);

        if($formulaireAeroport->isSubmitted() && $formulaireAeroport->isValid()){
            $em = $doctrine->getManager();
            $em->persist($aeroport);
            $em->flush();
            dd($aeroport);
        }

        // on envoie un objet FormView à la vue pour qu'elle puisse 
        // faire le rendu, pas le formulaire en soi
        $vars = ['unFormulaire' => $formulaireAeroport];

        return $this->render('/formulaires/aeroport_afficher.html.twig', $vars);
    }
}
