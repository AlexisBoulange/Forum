<?php

namespace Controller;


class HomeController {


    //Afficher la page d'accueil
    //Fonction par défaut 

    public function index(){

        return [
            "view" => "home.php",
            "data" => null,
            "titrePage" => "FORUM | ACCUEIL"
        ];
    }


}