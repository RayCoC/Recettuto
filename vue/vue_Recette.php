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
    function recettePrincipal() {
        vue::render("Recette/index.php");
    }
    function pageAjout() {
        vue::render("Recette/ajout.php");
    }
}