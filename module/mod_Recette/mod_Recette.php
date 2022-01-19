<?php
require_once "./Controleur/controleurRecette.php";
class ModRecette {
    private $controleurRecette;

    function __construct() {
        $this->controleurRecette = new ControleurRecette();
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        switch ($action) {
            case 'Recette' :
                $this->controleurRecette->afficherPagePrincipalRecette($this->controleurRecette->afficherToutesRecettes());
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
            case 'supprimerIngredient' :
                $this->controleurRecette->deleteIng();
                break;
            case 'modifierHashtag' :
                $this->controleurRecette->affichePageModifHashtag();
                break;
            case 'formModifieHashtag' :
                $this->controleurRecette->updateHash();
                break;
            case 'supprimerHashtag' :
                $this->controleurRecette->deleteHash();
                break;
            case 'rechercher' :
                $this->controleurRecette->research();
                break;
            case 'filtre' :
                $this->controleurRecette->filtre();
                break;
            case 'voirRecette' :
                $this->controleurRecette->afficheRecette();
                break;
            case 'ajoutCommentaire' :
                $this->controleurRecette->ajouterAvis();
                break;
            case 'like' :
                $this->controleurRecette->like();
                break;
            case 'supprimerCommentaire' :
                $this->controleurRecette->deleteAvis();
                break;
            case 'likeCommentaire' :
                $this->controleurRecette->likeComment();
                break;
            case 'signalerCommentaire' :
                $this->controleurRecette->signalerCommentaire();
                break;
        }
    }
}