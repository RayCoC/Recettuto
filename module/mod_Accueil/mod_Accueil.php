<?php
include_once "./Controleur/controleurAccueil.php";
    class ModAccueil {
        private $controleurAcceuil;
        function __construct()
        {
            $this->controleurAcceuil = new ControleurAccueil();
            $action = "";
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            switch ($action) {
                default :
                    $this->controleurAcceuil->AfficherAccueil();
                    break;
            }
        }

    }