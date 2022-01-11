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

        $info = $this->modele->infoUtilisateur($_SESSION['nomUtilisateur']);



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
        $rec=$this->modele->recetteUtilisateur($_SESSION['nomUtilisateur']);
        $data= array();
        if (!empty($rec)){

            foreach ($rec as $item=>$value){
               $data['Recette'][$item]= array("img"=>$value[5], "titre" => $value[2],"date"=>$value[9],"difficulte"=>$value[11]);

            }

        }
        $info = $this->modele->infoUtilisateur($_SESSION['nomUtilisateur']);

        foreach ($info as $value) {
            $data['utilisateur']['date'] = $value[3];

        }
        $this->vue->mesRecettes($data);
    }

    function afficherAbonnements(){
        $abo=$this->modele->abonnementUtilisateur();

        $data=array();

        $info = $this->modele->infoUtilisateur($_SESSION['nomUtilisateur']);

        foreach ($info as $value) {
            $data['utilisateur']['date'] = $value[3];

        }
        if (!empty($abo)) {
            foreach ($abo as $item => $value) {
                $data['abonnements'][$item] = array("abo" => $value[0]);
            }
            $this->vue->abonnements($data);
        }
    }

}