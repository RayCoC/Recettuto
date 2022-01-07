<?php
require_once "./module/mod_Profil/controleur_Profil.php";

class ModProfil {
    private $controleurProfil;

    function __construct()
    {
        $this->controleurProfil = new ControleurProfil();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        else{
            $action="profil";
        }
        switch ($action) {
            case 'profil' :
                $this->controleurProfil->afficherProfil();
                break;



        }
    }

}