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
        vue::render("Recette/Update/modifierIngredient.php");
    }
    function recettePrincipal($data) {
        vue::render("Recette/index.php", array("Recette"=>$data));
    }
    function pageAjout() {
        vue::render("Recette/ajout.php");
    }
    function  pageModifierHashtag() {
        vue::render("Recette/Update/modifierHash.php");
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
    function pageVoirRecette($data) {
        vue::render("Recette/voirRecette.php",$data);
    }
    static function getIngredients() {
        echo '<tr>';
        foreach ($_SESSION['ingredient'] as $item => $v) {
            echo '<th>'.$v["nomIngredient"].'</th>
                    <th>'.$v["quantite"].'</th>
                    <th>'.$v["unite"].'</th>
                    <th><a href="index.php?action=modifierIngredient&ingredient='.$v["nomIngredient"].'&module=mod_Recette".>Modifier</a></th>
                    <th><a href="index?action=supprimerIngredient&ingredient='.$v["nomIngredient"].'&module=mod_Recette".>Supprimer</th>
                    </tr>';
        }
    }
    static function getHashtag() {
        echo '<tr>';
        foreach ($_SESSION['hashtag'] as $item => $v) {
            echo '<th>'.$v["nomHashtag"].'</th>
                  <th><a href="index.php?action=modifierHashtag&hashtag='.$v["nomHashtag"].'&module=mod_Recette".>Modifier</a></th>
                  <th><a href="index.php?action=supprimerHashtag&hashtag='.$v["nomHashtag"].'&module=mod_Recette".>Supprimer</th>
                    </tr>';
        }
    }
    static function afficheRecettes($data = []) {
        if ($data !=null) {
            foreach ($data['Recette'] as $item => $value) {
                echo '<a href=index.php?action=voirRecette&id=' . $value['id'] . '&module=mod_Recette><img class=imgRecette src=' . $value['img'] . '></a>';
            }
        }
        else {
            echo '<p> Not found </p>';
        }
    }
}