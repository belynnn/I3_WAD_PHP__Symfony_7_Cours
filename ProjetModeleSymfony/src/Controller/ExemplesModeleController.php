<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Repository\LivreRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExemplesModeleController extends AbstractController
{
    #[Route('/exemple/modele', name: 'app_exemples_modele')]
    public function index(): Response
    {
        return $this->render('exemples_modele/index.html.twig');
    }

    #[Route('/exemples/insert')]
    public function exempleInsert (ManagerRegistry $doctrine){
        $em = $doctrine->getManager(); // objet pour gérer le work unit
        $livre = new Livre();
        $livre->setTitre("La vie");
        $livre->setDescription("Livre sympa");
        $livre->setDatePublication(new \DateTime());
        $livre->setIsbn("84684684");
        $livre->setPrix(90);
    
        $em->persist($livre);
        $em->flush();
        dd($livre);
    }

    #[Route('/exemples/update')]
    public function exempleUpdate(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();

        $livre = new Livre();
        $livre->setTitre("Poupoté");
        $livre->setDescription("Un poti chat d'amour");
        $livre->setDatePublication(new \DateTime());
        $livre->setIsbn("15648952365489523");
        $livre->setPrix(90);

        // avant insertion
        dump ($livre);

        $em->persist($livre);
        $em->flush();

        // modifier le livre
        $livre->setPrix(20);
        $em->flush();

        dd($livre);
    }

    #[Route('/exemples/select/update')]
    public function exempleSelectUpdate(ManagerRegistry $doctrine){
        // obtenir un objet de la base de données
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Livre::class);
        $livre = $rep->find(1);
        
        // modifier l'objet de la base de données
        $livre->setTitre("La vie d'une petite sauterelle");
        $em->flush();
        
        dd($livre);
    }

    // obtenir tous les livres
    #[Route('/exemples/select/all')]
    public function selectAll(ManagerRegistry $doctrine){
        $em = $doctrine->getManager();
        $rep = $em->getRepository(Livre::class);

        $tousLesLivres = $rep->findAll();
        // dd($tousLesLivres); // toute la liste
        dd($tousLesLivres[2]); // un spécifique
    }

    // obtenir tous les Livres (simplifié) - sert juste à sélectionner, ne permet pas de modifier
    #[Route('exemples/select/all/inject/repo')]
    public function selectAllInjectRepo(LivreRepository $rep){
        $tousLesLivres = $rep->findAll();
        dd($tousLesLivres);
    }
}
