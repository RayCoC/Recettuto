<?php 
include_once './vue.php';
class VueRecette extends vue {
    private $modeleRecette;

    function __construct () {
        $this-> modeleRecette= new ModeleRecette();
    }
    function vueSelection ($selection) {
        $tab = $this->modeleRecette;
        foreach ($tab as $key => $value) {
            foreach ($value as $key2 => $v) {
                echo $v;
            }
        }
    }
    function pageModifierIngredient() {
        vue::render("Recette/Update/modifierIngredient");
    }
    function recettePrincipal() {
        vue::render("Recette/index.php");
    }
    function pageAjout() {
        vue::render("Recette/ajout.php");
    }
    function pageAjoutVide() {
        vue::render("Recette/Error/ajoutVide.php");
    }
    function listHashtag() {
        vue::render('Recette/listHashtag.php');
    }
    function listeIngredient() {
        vue::render("Recette/listIngredient.php");
    }
    function  pageAjoutIngredient() {
        vue::render("Recette/ajoutIngredient.php");
    }
    static function getIngredients() {
        echo '<tr>';
        foreach ($_SESSION['ingredient'] as $item => $v) {
            echo '<th>'.$v["nomIngredient"].'</th>
                    <th>'.$v["quantite"].'</th>
                    <th>'.$v["unite"].'</th>
                    <th><a href="index.php?action=modifierIngredient&ingredient='.$v["nomIngredient"].'&module=mod_Recette".>Modifier</a></th>
                    </tr>';
        }
    }
    static function getHashtag() {
        echo '<tr>';
        foreach ($_SESSION['hashtag'] as $item => $v) {
            echo '<th>'.$v["nomHashtag"].'</th>
                    </tr>';
        }
    }
    static function messsageError()
    {
        if (isset($_POST['add'])) {
            if (($_POST['nomIngredient']) == "" or ($_POST['quantite']) == "" or ($_POST['unite']) == "") {
                return true;
            }
        }
        else {
            return false;
        }
    }
}