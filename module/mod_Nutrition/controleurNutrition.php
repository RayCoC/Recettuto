<?php
include_once "./vue/vue_Nutrition.php";
class ControleurNutrition{
    private $vue;
    function __construct(){
        $this->vue = new VueNutrition();
    }
    function AfficherNutrition(){
        $this->vue->pageNutrition();
    }
}
