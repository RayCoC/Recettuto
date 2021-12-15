<?php
include_once "/home/etudiants/info/rhamouche/local_html/Php_Projet/vue.php";
class VueAuthentification extends vue{
    function __construct() {}
    function form_connexion() {
        vue::render("Authentification/connexion.php");
       
    }
}
