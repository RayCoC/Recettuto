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
        $this->vue->modifProfil();

            $sexe=1;


        $data =array('mdp' => $_POST['mdp'], 'nomUtilisateur'=>$_SESSION['nomUtilisateur'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'age'=>$_POST['age'], 'sexe'=>$sexe);
        $this->modele->modifierProfil($data);
    }


}