<?php
include_once "./Controleur/controleurAccueil.php";

class ModAccueil
{
    private $controleurAcceuil;

    function __construct()
    {
        $this->controleurAcceuil = new ControleurAccueil();
        switch ($this->getAction()) {
            default :
                $this->controleurAcceuil->AfficherAccueil();
                break;
        }
    }

    function getAction()
    {
        if (!isset($_GET['action'])) {
            $action = "";
        } else {
            return $_GET['action'];
        }
    }

}