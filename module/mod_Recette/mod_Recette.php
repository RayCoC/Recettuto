<?php
require_once "controleurRecette.php";
class ModRecette {
    private $controleurRecette;

    function __construct() {
        $this->controleurRecette = new ControleurRecette();
        $this->controleurRecette = new ControleurRecette();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        switch ($action) {
            case 'Recette' :
                $this->controleurRecette->afficherPagePrincipalRecette();
                break;
            case 'pageAjout' :
                $this->controleurRecette->afficherPageAjout();
                break;
            case 'form' :
                if (isset($_POST['submit'])) {
                    $this->controleurRecette->ajouterRecette();
                }
                else if (isset($_POST['add'])) {
                    $this->controleurRecette->ajoutIngredient();
                }
                else if (isset($_POST['voirListe'])) {
                    $this->controleurRecette->afficheListIngredient();
                }
                else if (isset($_POST['addHashtag'])) {
                    $this->controleurRecette->ajoutHashtag();
                }
                else if (isset($_POST['voirHashtag'])) {
                    $this->controleurRecette->afficheListeHashtag();
                }
                break;
            case 'modifierIngredient' :
                $this->controleurRecette->affichePageModifIngredient();
                break;
            case 'formModifieIngredient' :
                $this->controleurRecette->updateIng();
                break;
        }
    }
}