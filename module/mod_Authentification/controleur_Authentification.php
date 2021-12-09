<?php

require_once "./module/mod_Authentification/vue_Authentification.php";

class ControleurAuthentification{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueAuthentification();
       // $this->modele = new ModeleConnexion();
    }

    function test_Authentification() {
        if(isset($_SESSION['nomUtilisateur'])) {
            echo "Vous êtes connéctés en tant que <span>".$_SESSION['nomUtilisateur']."</span></br>";
            $this->vue->form_deconnexion();
        }
        else {
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
