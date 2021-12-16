<?php 
include_once './vue.php';
class VueRecette extends vue {

    function recettePrincipal() {
        vue::render("Recette/index.php");
    }
}