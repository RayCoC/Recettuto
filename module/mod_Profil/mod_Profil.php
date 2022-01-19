<?php
require_once "./Controleur/controleur_Profil.php";
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
            case 'favoris':
                $this->controleurProfil->afficherFavoris();
                break;
            case'commentaires':
                $this->controleurProfil->afficherCommentaires();
                break;
            case'subscribe':
                $this->controleurProfil->subscribe();
                break;
            case'unsubscribe':
                $this->controleurProfil->unsubscribe();
                break;
            case'signalements':
                $this->controleurProfil->afficherSignalement();
                break;
            case'bannir':
                $this->controleurProfil->bannir();
                break;
            case'annulerSignalement':
                $this->controleurProfil->annulerSignalement();
                break;
            case 'historique' :
                $this->controleurProfil->afficherHistorique();
                break;
        }
    }

}