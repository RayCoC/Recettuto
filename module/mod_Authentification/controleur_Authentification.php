<?php

require_once "./vue/vue_Authentification.php";
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
                $_SESSION['nomUtilisateur']=$login;
                return vue::render("Accueil/index.php");
            }
            else {
                $this->vue->form_connexion();
            }
        }
        else {
            $this->vue->form_connexion();
        }
    }
    function test_Inscription(){
        $this->vue->form_inscription();
    }

    function inscription(){
        $this->vue->form_inscription();

        if ($this->formVide()) {

        }
        else{
            if($_POST['sexe']=="homme"){
                $sexe=0;
            }
            else
                $sexe=1;

            $data =array('mdp' => $_POST['mdp'], 'nomUtilisateur'=>$_POST['nomUtilisateur'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'age'=>$_POST['age'], 'sexe'=>$sexe);



            $this->modele->ajoutUtilisateur($data);


        }
    }

    function formVide(){
        if (!isset($_POST['sexe']) or !isset($_POST['age']) or !isset($_POST['nom']) or !isset($_POST['prenom']) or !isset($_POST['mdp']) or !isset($_POST['nomUtilisateur']) or empty($_POST['nom'])or empty($_POST['prenom']) or empty($_POST['age'])  or empty($_POST['nomUtilisateur']) or empty($_POST['mdp'])) {
            return true;
        }
        else
            return false;
    }

    function deconnexion() {
        unset($_SESSION['nomUtilisateur']);
        return vue::render("Authentification/connexion.php");
    }



}