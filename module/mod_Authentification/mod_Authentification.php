<?php
require_once "./Controleur/controleur_Authentification.php";

class ModAuthentification {
    private $controleurAuthentification;

    function __construct()
    {
        $this->controleurAuthentification = new ControleurAuthentification();
        switch ($this->getAction()) {
            case 'connexion' :
                $this->controleurAuthentification->afficherConnexion();
                break;
            case 'deconnexion':
                $this->controleurAuthentification->deconnexion();
                break;
            case 'login' :
                $this->controleurAuthentification->login(htmlspecialchars($_POST['nomUtilisateur']), htmlspecialchars($_POST['mdp']));
                break;
            case 'inscription' ;
                $this->controleurAuthentification->test_Inscription();
                break;
            case 'inscriptionBD' ;
                $this->controleurAuthentification->inscription();


        }
    }
    function getAction() {
        if (!isset($_GET['action'])) {
            return "Authentification";
        }
        return $_GET['action'];
    }

}