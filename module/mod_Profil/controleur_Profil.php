<?php

require_once "./vue/vue_Profil.php";
require_once "modele_Profil.php";
class ControleurProfil{
    private $modele;
    private $vue;

    function __construct () {
        $this->vue = new VueProfil();
        $this->modele = new ModeleProfil();
    }

    function afficherProfil(){
        if(!isset($_GET['login'])) {
            $info = $this->modele->infoUtilisateur($_SESSION['nomUtilisateur']);
        }
        else{
            $info = $this->modele->infoUtilisateur($_GET['login']);
        }
        foreach ($info as $value){

            $data['utilisateur']['id']=$value[0];
            $data['utilisateur']['nom']=$value[1];
            $data['utilisateur']['prenom']=$value[2];
            $data['utilisateur']['date']=$value[3];
            if($value[4]==1){
                $sexe = "Femme";
            }
            else
                $sexe = "Homme";
            $data['utilisateur']['sexe']=$sexe;
            $data['utilisateur']['age']=$value[5];
            $data['utilisateur']['login']=$value[6];
        }
        $this->vue->Profil($data);
    }
    function modifProfil()
    {
        if ($_POST['sexe'] == "homme") {
            $sexe = 0;
        } else {
            $sexe = 1;
        }
        $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $data = array('password' => $mdp, 'nomUtilisateur' => $_SESSION['nomUtilisateur'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'age' => $_POST['age'], 'sexe' => $sexe);
        $this->modele->modifierProfil($data);
    }

    function afficherMesRecettes(){
        $rec=$this->modele->recetteUtilisateur($_GET['login']);
        $data= array();
        if (!empty($rec)){
            foreach ($rec as $item=>$value){
                $data['Recette'][$item]= array("idRec"=>$value[1],"img"=>$value[5], "titre" => $value[2],"date"=>$value[9],"difficulte"=>$value[11]);
            }
            VueProfil::afficheRecettes($data['Recette']);
        }
        else{
            $this->vue->profilVide("de recettes");
        }
    }

    function afficherAbonnements(){
        $abo=$this->modele->abonnementUtilisateur();
        $data=array();
        if (!empty($abo)) {
            foreach ($abo as $item => $value) {
                $data['abonnements'][$item] = array("abo" => $value[0]);
            }
            VueProfil::afficheAbonnements($data['abonnements']);
        }
        else{
            $this->vue->profilVide("d'abonnements");
        }
    }

    function afficherNotifications(){
        if ($_GET['login'] == $_SESSION['nomUtilisateur']){
            $rec=$this->modele->notificationUtilisateur();
            $data= array();
            if (!empty($rec)){
                foreach ($rec as $item=>$value){
                    $data['Notification'][$item]= array("idRec"=>$value[0],"img"=>$value[4], "titre" => $value[1],"date"=>$value[8],"difficulte"=>$value[10]);
                }
                VueProfil::afficheNotifications($data['Notification']);
            }
            else{
                $this->vue->profilVide("de nouvelles recettes à consulter");
            }
        }
    }

    function afficherFavoris(){
        $rec=$this->modele->recetteFavoris();
        $data= array();
        if (!empty($rec)){
            foreach ($rec as $item=>$value){
                $data['Favoris'][$item]= array("idRec"=>$value[0],"img"=>$value[4], "titre" => $value[1],"date"=>$value[8],"difficulte"=>$value[10]);
            }
            VueProfil::afficheFavoris($data['Favoris']);
        }
        else{
            $this->vue->profilVide("de recettes favorites");
        }
    }

    function afficherCommentaires(){
        $commentaires=$this->modele->commentaireUtilisateur();
        $data=array();
        if (!empty($commentaires)) {
            foreach ($commentaires as $item => $value) {
                $nomRecette=$this->modele->getNomRecette($value[5]);
                foreach ($nomRecette as $item2 => $value2) {
                    $nomRec=$value2[0];
                }
                $data['commentaires'][$item] = array("textAvis" => $value[1], "nbEtoiles" => $value[2], "nbPouceBleu" => $value[3], "nomRec" => $nomRec, "idRec" => $value[5]);
            }
            VueProfil::afficheCommentaires($data['commentaires']);
        }
        else{
            $this->vue->profilVide("de commentaires");
        }

    }

    function subscribe(){
        $this->modele->abonner();
        $this->afficherProfil();
    }

    function unsubscribe(){
        $this->modele->desabonner();
        $this->afficherProfil();
    }

    function afficherSignalement(){
        $signalement=$this->modele->avisSignaler();

        $data=array();
        if (!empty($signalement)) {
            foreach ($signalement as $item => $value) {
                $data['signalements'][$item] = array("textAvis" => $value[0], "utilisateur" => $value[1], "idAvis" => $value[2]);
            }
            VueProfil::afficheSignalements($data['signalements']);
        }
        else{
            $this->vue->profilVide("de signalement");
        }
    }

    function bannir(){
        if (isset($_SESSION['nomUtilisateur'])) {
            if ($_SESSION['role']==3) {
                $idAvis=$_POST['idAvis'];
                $this->modele->bannir($idAvis);
                $this->afficherSignalement();
            }
        }
    }

    function annulerSignalement(){
        if (isset($_SESSION['nomUtilisateur'])) {
            if ($_SESSION['role'] == 3) {
                $idAvis = $_POST['idAvis'];
                $this->modele->enleverSignalement($idAvis);
                $this->afficherSignalement();
            }
        }
    }
    function afficherHistorique() {
        $historique = $this->modele->afficheHistorique($_GET['login']);
        $data = array();
        if (!empty($historique)) {
            foreach ($historique as $item => $value) {
                $data['historique'][$item] = array("idRec" => $value[0], "titre" => $value[1], "img" => $value[2], "dateVisionnement" => $value[3], "difficulte" => $value[4]);
            }
            VueProfil::historique($data['historique']);
        }
        else {
            VueProfil::profilVide("d'historique");
        }
    }

    public function enleverNotification()
    {
        if (isset($_SESSION['nomUtilisateur'])) {
            $idRec = $_POST['idRec'];
            $this->modele->enleverNotification($idRec);
            $this->afficherNotifications();

        }
    }
}