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
    function afficherPagePrincipalRecette($v) {
        $data = [];
        if ($v != null) {
            foreach ($v as $item => $value) {
                $data['Recette'][$item] = array('id' => $value[0], 'titre' => $value[1],'img' => $value[4]);
            }
        }
        $this->vue->recettePrincipal($data);
    }
    function afficherToutesRecettes() {
        return $this->modele->allRecette();
    }
    function afficheListeHashtag() {
        $this->vue->listHashtag();
    }
    function affichePageModifIngredient() {
        $this->vue->pageModifierIngredient();
        $_SESSION['ingredientURL'] = $_GET['ingredient'];
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
    function affichePageModifHashtag() {
        $this->vue->pageModifierHashtag();
        $_SESSION['hashtagURL'] = $_GET['hashtag'];
    }
    function afficheRecette() {
        $_SESSION['idRecette'] = $_GET['id'];
        $id = $_GET['id'];
        $rec = $this->modele->detailsRecette($id);
        $ing = $this->modele->detailsIngreientRecette($id);
        $avis = $this->modele->avis($id);
        $user = $this->modele->getUserNameRecette($_GET['id']);
        foreach ($rec  as $item => $value) {
            $data['nomRecette'] = $value[1];
            $data ['tpsPrepa'] = $value[3];
            $data["img"] = $value[4];
            $data['calories'] = $value[5];
            $data['tpsCuisson'] = $value[6];
            $data['desc'] = $value[7];
            $data['dateCrea'] = $value[8];
            $data['typePlat'] = $value[9];
            $data['difficulte'] =  $value[10];
        }
        foreach ($ing as $item => $value) {
            $data['ingredient'][$item]['nomIngredient'] = $value[1];
            $data['ingredient'][$item]['quantite'] = $value[2];
            $data['ingredient'][$item]['unite'] = $value[3];
        }
        foreach ($avis as $item => $value) {
            $data['avis'][$item]['user'] = $value[1];
            $data['avis'][$item]['message'] = $value[0];
            $data['avis'][$item]['idAvis'] = $value[2];
        }
        $data['user'] = $user[0][0];
        $this->vue->pageVoirRecette($data);
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
        if(ControleurRecette::FormVide() or empty($_SESSION['ingredient']) or is_numeric($_POST['titre']) or is_numeric($_POST['nomIngredient']) or $message == "false") {
            $this->vue->pageAjout();
        }
        else {
            $data = array('img' => $message, 'titre' => $_POST['titre'], 'description' => $_POST['desc'], 'difficulte' => $_POST['difficulte'], 'calories' => $_POST['calories'], 'typePlat'=>$_POST['typePlat'], 'cuisson' => $_POST['tpsCuisson'], 'temps' => $_POST['cuisson']);
            $lastID = $this->modele->creerNouvelleRecette($data);
            $this->modele->ajouterIngredient($lastID);
            vue::render("Recette/successAjout.php");
        }
    }
    function updateIng() {
        $this->modele->modifieIngredient($_POST['newNomIngredient'], $_POST['newQuantite'], $_POST['newUnite'], $_SESSION['ingredientURL']);
        $this->afficheListIngredient();
        unset($_SESSION['ingredientURL']);
    }
    function updateHash() {
        $this->modele->modifieHashtag($_POST['newHashtag'], $_SESSION['hashtagURL']);
        $this->afficheListeHashtag();
        unset($_SESSION['hashtagURL']);
    }
    function deleteHash() {
        $this->modele->supprimerHashtag($_GET['hashtag']);
        $this->afficheListeHashtag();
    }
    function deleteIng() {
        $this->modele->supprimerIngredient($_GET['ingredient']);
        $this->afficheListIngredient();
    }
    function filtre() {
        $data = $this->modele->filter($_GET['value']);
        $this->afficherPagePrincipalRecette($data);
    }
    function afficheDetails($id) {
        return $this->modele->detailsRecette($id);
    }
    function research() {
        $filtre = $_POST['filtre'];
        $value = $_POST['recherche'];
        $rec = $this->modele->rechercheBy($filtre, $value);
        $this->afficherPagePrincipalRecette($rec);
    }
    function ajouterAvis() {
        $this->afficheRecette();
        $idUser = $this->modele->getIdUserAvis($_SESSION['nomUtilisateur']);
        $this->modele->ajoutAvis($_SESSION['idRecette'], $_POST['avis'], 0, $idUser[0][0], 0);
    }
}