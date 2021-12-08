<?php
require_once "./module/mod_Connexion/controleurConnexion.php";

class ModConnexion {
    private $controleurConnexion;

    function __construct()
    {
        $this->controleurConnexion = new ControleurConnexion();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        else{
            $action="connexion";
        }

        switch ($action) {
            case 'connexion' :
                $this->controleurConnexion->test_connexion();
                break;
            case 'deconnexion':
                $this->controleur->deconnexion();
                break;
        }
    }

}
