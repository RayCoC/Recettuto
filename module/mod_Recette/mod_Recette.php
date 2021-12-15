<?php
    require_once "controleurRecette.php";
class ModRecette {
    private $controleurRecette;

    function __construct() {
        $this->controleurRecette = new ControleurRecette();
    }
}