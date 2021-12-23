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
        if ($this->modele->uploadImage() != "true") {
            $message = ModeleRecette::uploadImage();
            if ($message != "true") {
                echo $message;
                echo "<img src=./img/img.png>";
            }else {
                echo "ok";
                $filepath = "/img/img_upload/".$_FILES['file']['name'];
                echo "<img src=".$filepath.">";
            }
        }
        else {
            vue::render("Recette/successAjout.php");
        }
    }
}