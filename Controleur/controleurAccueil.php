<?php
include_once "./vue/vue_Accueil.php";
require_once "./module/mod_Accueil/modele_Acceuil.php";
include_once "controleur.php";
class ControleurAccueil extends Controleur{
    private $vue_Accueil;
    private $modele;

    function __construct()
    {
        $this->vue_Accueil = new VueAccueil();
        $this->modele = new ModeleAcceuil();
    }
    function AfficherAccueil () {
        $data= array();
        $pop=$this->modele->recettePopulaire();
        foreach ($pop as $item=>$value){
            $data['Populaire'][$item]= array("idRec"=>$value[0], "titre"=>$value[1],"img"=>$value[2]);
        }

        $rec=$this->modele->recetteRecent();
        foreach ($rec as $item=>$value){
            $data['Recent'][$item]= array("idRec"=>$value[0], "titre"=>$value[1],"img"=>$value[2]);
        }

        $alea=$this->modele->recetteAleatoire();
        foreach ($alea as $item=>$value){
            $data['Aleatoire'][$item]= array("idRec"=>$value[0], "titre"=>$value[1],"img"=>$value[2]);
        }

        $type=$this->modele->typePlat();
        foreach ($type as $item=>$value){
            $data['Plat'][$item]= array("idType"=>$value[0], "nomType"=>$value[1]);
        }

        $this->vue_Accueil->pageAccueil($data);
    }
}
?>