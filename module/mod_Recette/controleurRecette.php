<?php

require_once "./vue/vue_Recette.php";
require_once "modeleRecette.php";
class ControleurRecette{
    private $modele;
    private $vue;
    private $i;

    function __construct () {
        $this->vue = new VueRecette();
        $this->modele = new ModeleRecette();
        $this->i = 0;
    }
    function afficherPagePrincipalRecette() {
        $this->vue->recettePrincipal();
    }
    function afficheListeHashtag() {
        $this->vue->listHashtag();
    }
    function afficherPageAjout() {
        $this->vue->pageAjout();
    }
    function afficheListIngredient() {
        $this->vue->listeIngredient();
    }
    function affichePageAjoutIngredient() {
        $this->vue->pageAjoutIngredient();
    }
    static function FormVide() {
        if ($_POST['titre']== "" or $_POST['desc'] == "" or $_POST['typePlat'] == "" or $_POST['calories'] == "" or $_POST['difficulte'] =="" or $_POST['cuisson'] == "") {
            return true;
        }
        return false;
    }
    function ajoutHashtag() {
        $this->modele->ajoutHashtagTableau($_POST['hashtag']);
        $this->afficherPageAjout();
    }
    function ajoutIngredient() {
        $this->afficherPageAjout();
        $this->modele->ajoutIngredientTableau($_POST['nomIngredient'], $_POST['quantite'], $_POST['unite']);
    }
    function ajouterRecette() {
        $message = $this->modele->uploadImage();
        if(ControleurRecette::FormVide() or empty($_SESSION['ingredient']) or is_numeric($_POST['titre']) or is_numeric($_POST['nomIngredient']) or !is_numeric($_POST['calories']) or is_numeric($_POST['unite']) or !is_numeric($_POST['quantite'])) {
            $this->vue->pageAjout();
        }
        else {
            $data = array('img' => $message, 'titre' => $_POST['titre'], 'description' => $_POST['desc'], 'difficulte' => $_POST['difficulte'], 'calories' => $_POST['calories'], 'typePlat'=>$_POST['typePlat'], 'cuisson' => $_POST['tpsCuisson'], 'temps' => $_POST['cuisson']);
            $lastID = $this->modele->creerNouvelleRecette($data);
            $this->modele->ajouterIngredient($lastID);
            vue::render("Recette/successAjout.php");
        }
    }
}