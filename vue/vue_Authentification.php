<?php
include_once "./vue.php";

class VueAuthentification extends vue
{
    function form_connexion($token, $message = null)
    {
        vue::render("Authentification/connexion.php", ['message' => $message], $token);

    }

    function form_inscription($message, $token)
    {
        vue::render("Authentification/inscription.php", $message, $token);
    }
}
