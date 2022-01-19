<?php
include_once "controleurNutrition.php";
class ModNutrition{
    private $controleurNutrition;
    function __construct(){
        $this->controleurNutrition = new ControleurNutrition();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        switch ($action) {
            default:
                $this->controleurNutrition->AfficherNutrition();
                break;
            case 'ajoutPlat' :
                $this->controleurNutrition->ajouterPlat();
                break;
            case 'recapitulatif':
                $this->controleurNutrition->afficherRecapitulatif();
                break;
            case 'retirer':
                $this->controleurNutrition->retirerPlat();
                break;
        }
    }
}