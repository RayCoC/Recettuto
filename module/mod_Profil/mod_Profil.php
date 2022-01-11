<?php
require_once "./module/mod_Profil/controleur_Profil.php";

class ModProfil {
    private $controleurProfil;

    function __construct()
    {
        $this->controleurProfil = new ControleurProfil();
        $action = "";
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        else{
            $action="profil";
        }
        switch ($action) {
            case 'profil' :
                $this->controleurProfil->afficherProfil();
                break;
            case 'modifProfil':
                $this->controleurProfil->afficherModifProfil();
                break;
            case 'infoModifier':
                $this->controleurProfil->modifProfil();
                break;
            case 'mesRecettes':
                $this->controleurProfil->afficherMesRecettes();
                break;
            case 'abonnements':
                $this->controleurProfil->afficherAbonnements();
                break;
            case'commentaires':
                $this->controleurProfil->afficherCommentaires();
                break;


        }
    }

}