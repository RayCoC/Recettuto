<?php
    include_once "./vue.php";
    class VueAccueil extends vue{

        function pageAccueil() {
            vue::render("Accueil/index.php");
        }
    }