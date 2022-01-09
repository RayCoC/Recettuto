<?php
    require_once "./Controleur/controleurUtilisateur.php";
    class ModUtilisateur {
        private $controleurUtilisateur;
        function __construct() {
            $this->controleurUtilisateur = new ControleurUtilisateur();
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            else {
                $action = "";
            }
            switch ($action)  {
                case 'rechercherUtilisateur' :
                    $this->controleurUtilisateur->affichePageRecherche();
                    break;
                case 'search' :
                    $this->controleurUtilisateur->searchUser();
                    break;
            }
        }
}?>