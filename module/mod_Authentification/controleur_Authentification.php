<?php

require_once "./module/mod_Authentification/vue_Authentification.php";
require_once "modele_Authentification.php";

class ControleurAuthentification{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueAuthentification();
        $this->modele = new ModeleAuthentification();
    }

    static function test_Connexion() {
        if(isset($_SESSION['nomUtilisateur'])) {
            return true;
        }
        else {
            return false;
        }
    }
    function afficherConnexion() {
        if (! ControleurAuthentification::test_Connexion()) {
            $this->vue->form_connexion();
        }
    }
    function login($login, $password) {
        $user=$this->modele->connexion($login);
        if(!empty($user)) {
            $count=password_verify($password, $user['password']);
            
            if($count) {
                $_SESSION['login']=$login;
                header("Refresh=1, /home/etudiants/info/rhamouche/local_html/Php_Projet/index.php");
            }
            else {
                $this->vue->form_connexion();
            }
        }
        else {
            $this->vue->form_connexion();
        }
    }
    function deconnexion() {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }
    function affiche() {
        $this->modele->afficheBD();
    }
}
