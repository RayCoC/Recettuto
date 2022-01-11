<?php
include_once "./vue.php";
class VueNutrition{

    function pageNutrition($data){
        vue::render("Nutrition/nutrition.php",$data);
    }
}

