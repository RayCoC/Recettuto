<?php

require_once "./module/mod_Connexion/vue_Connexion.php";
//require_once "./module/mod_Connexion/modele_connexion.php";

class ControleurConnexion {
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueConnexion();
       // $this->modele = new ModeleConnexion();
    }

    function test_connexion () {
        if(isset($_SESSION['nomUtilisateur'])) {
            echo "Vous êtes connéctés en tant que <span>".$_SESSION['nomUtilisateur']."</span></br>";
            $this->vue->form_deconnexion();
        }
        else {
            $this->vue->form_connexion();
        }
    }
/*
    function connexion () {

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
    function deconnexion () {
        unset($_SESSION['login']);
        $this->vue->form_connexion();
    }
*/
}
