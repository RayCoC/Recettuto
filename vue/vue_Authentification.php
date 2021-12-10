<?php

class VueAuthentification extends Vue{

    function form_connexion() {
        require_once "./module/mod_Authentification/connexion.php";
       
    }

    function form_deconnexion() {
        echo "<a href=index.php?action=deconnexion&module=mod_Authentification>Deconnexion</a><br/>";

    }
}
