<?php

class VueConnexion {

    function form_connexion() {
        require_once "./module/mod_Connexion/connexion.php";
       
    }

    function form_deconnexion() {
        echo "<a href=index.php?action=deconnexion&module=mod_Connexion>Deconnexion</a><br/>";

    }
}
