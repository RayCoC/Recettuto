<?php
include_once "./vue.php";
class VueNutrition{

    function pageNutrition($data){
        vue::render("Nutrition/nutrition.php",$data);
    }

    function pageRecapitulatif($data){
        vue::render("Nutrition/recapitulatif.php",$data);
    }

    static function affichePlat($data){
        foreach ($data as $item => $value) {
            echo  '
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">'.$value['nomPlat'].'</h6>
                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i><span>'.$value['nbKcal'].' Kcal</span></h2>
                    <p class="m-b-0">'.$value['date'].'<span class="f-right"></span></p>
                    <button class="btn btn-danger" id="retirer" type="button" name="retirer" onclick="retirer('.$value['idNutrition'].')" color="danger" rounded="true" mdbWavesEffect>Retirer</button>
                </div>
            </div>
        </div>';

        }
    }

    public function pageVide(){
        vue::render("Nutrition/recapitulatifVide.php");
    }
}