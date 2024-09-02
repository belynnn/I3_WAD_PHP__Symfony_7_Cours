<?php
namespace App\Controller;

use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExerciceDateController extends AbstractController
{
    #[Route('/exercice_date/today')]
    public function afficherDate(): Response
    {
        $date = new DateTime();

        $vars = [
            'date' => $date,
        ];

        return $this->render('exercice_date/exercice_date.html.twig', $vars);
    }
}