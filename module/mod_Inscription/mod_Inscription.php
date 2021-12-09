<?php
require_once "./module/mod_Inscription/controleur_Inscription.php";

class ModInscription{
    private $controleurInscription;

    function __construct()
    {
        $this->controleurInscription= new ControleurInscription();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        else{
            $action="inscription";
        }

        switch ($action) {
            case 'inscription' :
                $this->controleurInscription->test_Inscription();
                break;

        }
    }

}