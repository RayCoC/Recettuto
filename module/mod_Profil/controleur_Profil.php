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
    function afficherModifProfil(){

        $this->vue->modifProfil();


    }
    function modifProfil(){

        if($_POST['sexe']=="homme")
            $sexe=1;


        $data =array('mdp' => "test", 'nomUtilisateur'=>$_SESSION['nomUtilisateur'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'age'=>$_POST['age'], 'sexe'=>$sexe);
        $this->modele->modifierProfil($data);
        $this->afficherProfil();
    }

    function afficherMesRecettes(){
        $rec=$this->modele->recetteUtilisateur($_GET['login']);
        $data= array();

        $info = $this->modele->infoUtilisateur($_GET['login']);

        foreach ($info as $value) {
            $data['utilisateur']['date'] = $value[3];
        }
        if (!empty($rec)){

            foreach ($rec as $item=>$value){
               $data['Recette'][$item]= array("img"=>$value[5], "titre" => $value[2],"date"=>$value[9],"difficulte"=>$value[11]);

            }
            $this->vue->mesRecettes($data);
        }
        else{
            $data['message']="de recettes";
            $this->vue->profilVide($data);
        }

    }

    function afficherAbonnements(){
        $abo=$this->modele->abonnementUtilisateur();

        $data=array();

        $info = $this->modele->infoUtilisateur($_GET['login']);

        foreach ($info as $value) {
            $data['utilisateur']['date'] = $value[3];

        }
        if (!empty($abo)) {
            foreach ($abo as $item => $value) {
                $data['abonnements'][$item] = array("abo" => $value[0]);
            }
            $this->vue->abonnements($data);
        }
        else{
            $data['message']="d'abonnements";
            $this->vue->profilVide($data);
        }
    }

    function afficherCommentaires(){
        $commentaires=$this->modele->commentaireUtilisateur();

        $data=array();

        $info = $this->modele->infoUtilisateur($_GET['login']);

        foreach ($info as $value) {
            $data['utilisateur']['date'] = $value[3];
        }

        if (!empty($commentaires)) {
            foreach ($commentaires as $item => $value) {
                $nomRecette=$this->modele->getNomRecette($value[5]);
                foreach ($nomRecette as $item2 => $value2) {
                    $nomRec=$value2[0];
                }
                $data['commentaires'][$item] = array("textAvis" => $value[1], "nbEtoiles" => $value[2], "nbPouceBleu" => $value[3], "nomRec" => $nomRec);
            }
            $this->vue->commentaires($data);
        }
        else{
            $data['message']="de commentaires";
            $this->vue->profilVide($data);
        }


    }
}