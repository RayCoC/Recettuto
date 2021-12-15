<?php

require_once "./vue/vue_Recette.php";
require_once "modele_Recette.php";
class ControleurRecette{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueRecette();
        $this->modele = new ModeleRecette();
    }
}