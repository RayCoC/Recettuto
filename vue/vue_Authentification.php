<?php
include_once "./vue.php";
class VueAuthentification extends vue{
    function form_connexion() {
        vue::render("Authentification/connexion.php");

    }
    function form_inscription(){
        vue::render("Authentification/inscription.php");
    }
}
