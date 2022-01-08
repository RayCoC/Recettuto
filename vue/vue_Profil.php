<?php
include_once "./vue.php";
class VueProfil extends vue{

    function Profil($data) {
        vue::render("Profil/profil.php", $data);
    }
}