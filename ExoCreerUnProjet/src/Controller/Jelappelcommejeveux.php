<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Jelappelcommejeveux extends AbstractController{
    // Actions -> fonction -> méthodes
    #[Route("/accueil/{nom}")] // -> localhost:8000/accueil
    function accueil(Request $req){
        $array = ['Calynn', 'Lancelot', 'Xena'];
        // dd($req); // -> var_dump + die
        return new Response("Aloha ". $req->get("nom") ." ♥");
    }
};