<?php
include_once "./vue/vue_Nutrition.php";
require_once "modele_Nutrition.php";
class ControleurNutrition{
    private $vue;
    private $modele;

    function __construct(){
        $this->vue = new VueNutrition();
        $this->modele = new ModeleNutrition();
    }

    function AfficherNutrition(){
        $data=[];
        $nbKcal=$this->modele->getNbKcal();
        foreach ($nbKcal as $item=>$value){
            $data['nbKcal'] = $value[0];
        }

        $data['nbKcalRestant']=$this->nbKcalParJour()-$data['nbKcal'];
        $this->vue->pageNutrition($data);
    }

    function ajouterPlat(){
        if ($this->formVide() or !isset($_SESSION['nomUtilisateur'])) {

        }
        else {
            $data = array('nomPlat' => $_POST['nomPlat'], 'nbCalories' => $_POST['nbCalories']);
            $this->modele->ajoutPlat($data);
        }
        $this->AfficherNutrition();
    }

    function formVide(){
        if (($_POST['nomPlat'])=='' or ($_POST['nbCalories'])=='') {
            return true;
        }
        else
            return false;
    }

    function nbKcalParJour(){
        return $this->modele->getNbKcalRecommande();
    }
}
