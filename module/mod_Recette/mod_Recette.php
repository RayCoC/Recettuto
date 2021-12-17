<?php
    require_once "controleurRecette.php";
class ModRecette {
    private $controleurRecette;

    function __construct() {
        $this->controleurRecette = new ControleurRecette();
        $this->controleurRecette = new ControleurRecette();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        switch ($action) {
            case 'Recette' : 
                $this->controleurRecette->afficherPagePrincipalRecette();
                break;
            case 'pageAjout' : 
                $this->controleurRecette->afficherPageAjout();
                break;
        }
    }
}