<?php
require_once "./module/mod_Authentification/controleur_Authentification.php";

class ModAuthentification {
    private $controleurAuthentification;

    function __construct()
    {
        $this->controleurAuthentification = new ControleurAuthentification();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        else{
            $action="Authentification";
        }

        switch ($action) {
            case 'connexion' :
                $this->controleurAuthentification->test_Authentification();
                break;
            case 'deconnexion':
                $this->controleurAuthentification->deconnexion();
                break;
            case 'inscription' ;
                $this->controleurAuthentification->test_Inscription();
        }
    }

}
