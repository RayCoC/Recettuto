<?php

require_once "./vue/vue_Authentification.php";
require_once "./module/mod_Authentification/modele_Authentification.php";
require_once 'controleur.php';
class ControleurAuthentification extends Controleur{
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
    function afficherConnexion($message=null) {
        if (! ControleurAuthentification::test_Connexion()) {
            $this->vue->form_connexion($this->getToken(), $message);
        }
    }
    function login($login, $password)
    {
        $user = $this->modele->connexion($login);
        if (!isset($_SESSION['token']) or empty($_SESSION['token'])) {
            $this->afficherConnexion("Une erreur est survenue");
        }
        else if (!isset($_POST['token']) or empty($_POST['token'])) {
            $this->afficherConnexion("Une erreur est survenue");
        }else {
            if ($_POST['token'] == $_SESSION['token']) {
                if (!empty($user)) {
                    $count = password_verify($password, $user['password']);
                    if ($count) {
                        if ($this->modele->getRole($login) == 1) {
                            $this->afficherConnexion("Vous avez été banni du site.");
                            return;
                        }
                        $_SESSION['nomUtilisateur'] = $login;
                        vue::render("Accueil/index.php");
                    } else {
                        $this->afficherConnexion("Mot de passe incorrect");
                    }
                } else {
                    $this->afficherConnexion("Login incorrect");
                }
            }
            else {
                $this->afficherConnexion("Une erreur est survenue");
            }
        }
    }
    function test_Inscription(){
        $this->vue->form_inscription($this->getToken());
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
        $this->afficherConnexion();
    }
}