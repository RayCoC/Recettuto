<?php
    include_once "./vue.php";
    class VueProfil extends vue{

        function Profil() {
            vue::render("Profil/profil.php");
        }
    }