<?php

require_once "./vue/vue_Recette.php";
require_once "modeleRecette.php";
class ControleurRecette{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueRecette();
        $this->modele = new ModeleRecette();
    }
    function afficherPagePrincipalRecette() {
        $this->vue->recettePrincipal();
    }
    function afficherPageAjout() {
        $this->vue->pageAjout();
    }
    function ajouterRecette() {
        $message = $this->modele->uploadImage();
        if(!isset($_POST['titre']) or !isset($_POST['desc']) or !isset($_POST['typePlat']) or !isset($_POST['calories']) or !isset($_POST['difficulte']) or !strlen($message)>20 or isset($_POST['cuisson'])) {
            $this->vue->pageAjoutVide();
        }
        else {
            $data = array('img' => $message, 'titre' => $_POST['titre'], 'description' => $_POST['desc'], 'difficulte' => $_POST['difficulte'], 'calories' => $_POST['calories'], 'typePlat'=>$_POST['typePlat'], 'cuisson' => $_POST['tpsCuisson'], 'temps' => $_POST['cuisson']);
            $this->modele->creerNouvelleRecette($data);
            vue::render("Recette/successAjout.php");
        }
    }
}