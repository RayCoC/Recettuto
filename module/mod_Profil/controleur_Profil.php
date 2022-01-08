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
        foreach ($info as $item=>$value){

            $data['utilisateur']['id']=$value[0];
            $data['utilisateur']['nom']=$value[1];
            $data['utilisateur']['prenom']=$value[2];
            $data['utilisateur']['date']=$value[3];
            $data['utilisateur']['sexe']=$value[4];
            $data['utilisateur']['age']=$value[5];
            $data['utilisateur']['login']=$value[6];

        }
        foreach($data['utilisateur'] as $item=>$value){
            echo $value;
        }
        $this->vue->Profil($data);

    }


}