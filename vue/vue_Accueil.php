<?php
    class VueAccueil extends  Vue {
        function __construct() {}

        function pageAccueil() {
            $this->render("Accueil/index.php");
        }
    }