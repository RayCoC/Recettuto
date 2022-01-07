<?php

require_once "./vue/vue_Profil.php";
require_once "modele_Profil.php";
class ControleurProfil{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueProfil();
        $this->modele = new ModeleProfil();
    }

    function afficherProfil(){
        $this->vue->Profil();
    }    
 

}