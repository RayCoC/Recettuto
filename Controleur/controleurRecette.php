<?php

require_once "./vue/vue_Recette.php";
require_once "./module/mod_Recette/modeleRecette.php";
require_once "controleur.php";
class ControleurRecette extends Controleur{
    private $modele;
    private $vue;

    function __construct () {
        $data = array();
        $this->vue = new VueRecette();
        $this->modele = new ModeleRecette();
    }
    function afficherPagePrincipalRecette($v) {
        $this->vue->recettePrincipal();
    }
    function afficherToutesRecettes() {
        return $this->modele->allRecette();
    }
    function afficheListeHashtag() {
        $this->vue->listHashtag();
    }
    function affichePageModifIngredient() {
        $this->vue->pageModifierIngredient($this->getToken());
        $_SESSION['ingredientURL'] = $_GET['ingredient'];
    }
    function afficherPageAjout() {
        $this->vue->pageAjout($this->getToken());
    }
    function afficheListIngredient() {
        $this->vue->listeIngredient();
    }
    function affichePageAjoutIngredient() {
        $this->vue->pageAjoutIngredient();
    }
    function affichePageModifHashtag() {
        $this->vue->pageModifierHashtag($this->getToken());
        $_SESSION['hashtagURL'] = $_GET['hashtag'];
    }
    function afficheCommentaire($id) {
        $data = array();
        $avis = $this->modele->avis($id);
        if (!empty($avis)) {
            foreach ($avis as $item => $value) {
                $data['avis'][$item]['user'] = $value[1];
                $data['avis'][$item]['message'] = $value[0];
                $data['avis'][$item]['idAvis'] = $value[2];
            }
            VueRecette::espaceCommentaire($data);
        }
    }
    function afficheRecette() {
        $id = $_GET['id'];
        $rec = $this->modele->detailsRecette($id);
        $ing = $this->modele->detailsIngreientRecette($id);
        $avis = $this->modele->avis($id);
        $user = ModeleRecette::getUserNameRecette($_GET['id']);
        foreach ($rec  as $item => $value) {
            $data['nomRecette'] = $value[1];
            $data['note'] = $value[2];
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
        $data['user']=$this->getUserName();
        $this->vue->pageVoirRecette($data);
    }
    static function FormVide():bool {
        if ($_POST['titre']== "" or $_POST['desc'] == "" or $_POST['typePlat'] == "" or $_POST['calories'] == "" or $_POST['difficulte'] =="" or $_POST['cuisson'] == "") {
            return true;
        }
        return false;
    }
    function ajoutHashtag() {
        if($this->checkToken()) {
            $this->modele->ajoutHashtagTableau($_POST['hashtag']);
        }    
        $this->afficherPageAjout();
    }
    function ajoutIngredient() {
        $this->afficherPageAjout();
        $this->modele->ajoutIngredientTableau($_POST['nomIngredient'], $_POST['quantite'], $_POST['unite']);
    }
    function ajouterRecette() {
        $message = $this->modele->uploadImage();
        if(ControleurRecette::FormVide() or empty($_SESSION['ingredient']) or is_numeric($_POST['titre']) or is_numeric($_POST['nomIngredient']) or $message == "false" or $this->checkToken()==false) {
            $this->afficherPageAjout();
        }
        else {
            $data = array('img' => $message, 'titre' => $_POST['titre'], 'description' => $_POST['desc'], 'difficulte' => $_POST['difficulte'], 'calories' => $_POST['calories'], 'typePlat'=>$_POST['typePlat'], 'cuisson' => $_POST['tpsCuisson'], 'temps' => $_POST['cuisson']);
            $lastID = $this->modele->creerNouvelleRecette($data);
            $this->modele->ajouterIngredient($lastID);
            vue::render("Recette/successAjout.php");
        }
    }
    function updateIng() {
        if($this->checkToken()) {
            $this->modele->modifieIngredient($_POST['newNomIngredient'], $_POST['newQuantite'], $_POST['newUnite'], $_SESSION['ingredientURL']);
        }    
        $this->afficheListIngredient();
        unset($_SESSION['ingredientURL']);
    }
    function updateHash() {
        if($this->checkToken()) {
            $this->modele->modifieHashtag($_POST['newHashtag'], $_SESSION['hashtagURL']);
            unset($_SESSION['hashtagURL']);
        }    
        $this->afficheListeHashtag();
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
        $v = $this->modele->filter($_GET['value']);
        $data = [];
            foreach ($v as $item => $value) {
                $data['Recette'][$item] = array('id' => $value[0], 'titre' => $value[1],'img' => $value[4]);
            }
            VueRecette::afficheRecettes($data);
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
        $idUser = $this->modele->getIdUserAvis($_SESSION['nomUtilisateur']);
        if ($this->modele->verifieCommentaireUnique($idUser[0][0], $_SESSION['idRecette']) && isset($_SESSION['nomUtilisateur'])) {
            $this->modele->ajoutAvis($_SESSION['idRecette'], $_GET['avis'], 0, $idUser[0][0], 0);
            $this->afficheCommentaire($_SESSION['idRecette']);
        }
    }
    function nbPouce($login) {
        $this->modele->verifieNbPouce($login, $_GET['idRec']);
    }
     function like() {
        if (isset($_SESSION['nomUtilisateur'])){
             if (isset($_GET['idRec']) && $this->modele->verifieNbPouce($_SESSION['nomUtilisateur'], $_GET['idRec'])) {
                 $this->modele->likeRecette($_SESSION['nomUtilisateur'], $_GET['idRec']);
             }
        }
         $this->modele->getNbLike($_GET['idRec']);
    }
    static function getUserName() {
        $user = ModeleRecette::getUserNameRecette($_SESSION['idRecette']);
        return $user[0];
    }
    static function checkCreateurRecette() :bool {
        $user = self::getUserName();
        if (isset($_SESSION['nomUtilisateur'])) {
            if ($user == $_SESSION['nomUtilisateur']) {
                return true;
            }
        }
        return false;
    }
    function deleteAvis() {
        if (isset($_SESSION['nomUtilisateur']) and isset($_GET['user'])) {
            if (ControleurRecette::checkCreateurRecette() or $_GET['user'] == $_SESSION['nomUtilisateur']){
               $this->modele->deleteComment($_GET['idAvis']);
            }
        }
        $this->afficheCommentaire($_SESSION['idRecette']);
    }
    function likeComment() {
        if (isset($_SESSION['nomUtilisateur'])) {
            $this->modele->likeComment($_GET['idAvis']);
        }
        $this->modele->getNbLike($_GET['idAvis']);
    }
}