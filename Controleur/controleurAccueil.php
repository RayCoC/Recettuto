<?php
include_once "./vue/vue_Accueil.php";
include_once "controleur.php";
class ControleurAccueil extends Controleur{
    private $vue_Accueil;
    function __construct()
    {
        $this->vue_Accueil = new VueAccueil();
    }
    function AfficherAccueil () {
        $this->vue_Accueil->pageAccueil();
    }
}
?>