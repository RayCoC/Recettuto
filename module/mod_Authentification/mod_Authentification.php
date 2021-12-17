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
                $this->controleurAuthentification->deconnexion();
                break;
            case 'login' : 
                $this->controleurAuthentification->login($_POST['nomUtilisateur'], $_POST['mdp']);
                break;
            case 'inscription' ;
                $this->controleurAuthentification->test_Inscription();
                break;
            case 'inscriptionBD' ;
                $this->controleurAuthentification->inscription();
            
                
        }
    }

}
