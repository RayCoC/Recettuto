<?php

require_once "./module/mod_Authentification/vue_Authentification.php";

class ControleurAuthentification{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueAuthentification();
       // $this->modele = new ModeleConnexion();
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
/*
    function Authentification() {

        $login=$_POST['login'];
        $password=$_POST['password'];
        $user=$this->modele->connexion($login);

        if(!empty($user)) {
            $count=password_verify($password,$user['password']);

            if($count) {
                $_SESSION['login']=$login;
                $this->test_connexion();
            }
            else {
                echo "mdp pas bon";
                $this->vue->form_connexion();
            }
        }
        else {
            echo "login incorrecte";
            $this->vue->form_connexion();
        }
    }
    function deconnexion() {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }
*/
}
