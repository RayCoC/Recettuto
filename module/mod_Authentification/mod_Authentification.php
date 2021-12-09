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
                $this->controleurAuthentification->afficherConnexion();
                break;
            case 'deconnexion':
                $this->controleur->deconnexion();
                break;
        }
    }

}
