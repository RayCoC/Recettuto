<?php
include_once "./vue/vue_Utilisateur.php";
include_once "controleur.php";
include_once "./module/mod_Utilisateur/modele_Utilisateur.php";

class ControleurUtilisateur extends Controleur
{
    function __construct()
    {
        parent::__construct(new ModeleUtilisateur(), new VueUtilisateur());
    }

    function affichePageRecherche()
    {
        $this->vue->PageAccueilUtilisateur();
    }

    function searchUser()
    {
        if (isset($_POST['user'])) {
            $data = $this->modele->searchUser($_POST['user']);
            if (!empty($data)) {
                $this->vue->afficheUtilisateur($data);
            }
        }
    }

    function banUser()
    {
        if (isset($_GET['idUser'])) {
            if ($_SESSION['role'] == 3) {
                $this->modele->bannir($_GET['idUser']);
                $this->affichePageRecherche();
            }
        }
    }

} ?>