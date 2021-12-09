<?php

class VueAuthentification{

    function form_connexion() {
        require_once "./module/mod_Authentification/connexion.php";
       
    }

    function form_inscription(){
        require_once "./module/mod_Authentification/inscription.php";
    }


    function form_deconnexion() {
        echo "<a href=index.php?action=deconnexion&module=mod_Authentification>Deconnexion</a><br/>";

    }
}
