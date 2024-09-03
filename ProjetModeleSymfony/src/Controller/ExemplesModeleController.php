<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExemplesModeleController extends AbstractController
{
    #[Route('/exemples/modele', name: 'app_exemples_modele')]
    public function index(): Response
    {
        return $this->render('exemples_modele/index.html.twig');
    }
}
