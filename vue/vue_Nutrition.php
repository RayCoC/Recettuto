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
    public function recapVide() {
        Vue::render("./Nutrition/recapitulatifVide.php");
    }
    public function pageVide(){
       echo '<div class="alert alert-success" role="alert">
                Vous n\'avez pas consommés de plat
        </div>';
    }
    static function pageNutritionInfo($data) {
        echo '<form method="post" id="form">
                <div class="container px-4 py-5 mx-auto">
                    <div class="card card0">
                        <div class="d-flex flex-lg-row flex-column-reverse">
                            <div class="card card1">
                                <div class="row justify-content-center my-auto">
                                    <div class="col-md-8 col-10 my-5">
                                        <div class="row justify-content-center px-3 mb-3"> <img id="logo" src="./img/RecettutoIMG.png"> </div>
                                        <h3 class="mb-5 text-center heading">Ajouter un plat</h3>
                                        <div class="form-group"> <label class="form-control-label text-muted">Nom plat</label> <input type="text" id="nomPlat" name="nomPlat" class="form-control"> </div>
                                        <div class="form-group"> <label class="form-control-label text-muted">Nombre de calories</label> <input type="text" id="nbCalories" name="nbCalories" class="form-control"> </div>
                                        <div class="row justify-content-center my-3 px-3"> <button id="valider">Valider</button> </div>
                                    </div>
                                </div>
                            </div>  
                            <div class="card card2" id="result">
                                <div class="my-auto mx-md-5 px-md-5 right">';
                                    if (isset($_SESSION['nomUtilisateur'])) {
                                        echo '<h3 class="text-white">Aujourd\'hui</h3>';
                                        if ($data['nbKcal'] > 0) {
                                            echo '<h3 class="text-white">' . $data['nbKcal'] . ' calories absorbées</h3>';
                                        } else {
                                            echo '<h3 class="text-white">Vous n\'avez pas consommés de plat</h3>';
                                        }
                                        if ($data['nbKcalRestant'] > 0) {
                                            echo '<p class="text-white">Vous pouvez encore absorber ' . $data['nbKcalRestant'] . ' calories aujourd\'hui</p>';
                                        } else if ($data['nbKcalRestant'] == 0) {
                                            echo '<p class="text-white">Vous avez consommés le nombre idéal de calories</p>';
                                        } else {
                                            echo '<p class="text-white">Vous etes à ' . $data['nbKcalRestant'] . ' calories en trop aujourd\'hui</p>';
                                        }
                                        echo '<p class="text-white">Pour acceder à votre recapitulatif cliquez <a id="recap" href="index.php?action=recapitulatif&module=mod_Nutrition" class="text-white">ici</a></p>';
                                    }
                                    else {
                                        echo '<p class="text-white">Il vous faut un compte pour utiliser la page nutrition ! cliquez <a href="index.php?action=inscription&module=mod_Authentification" class="text-white">ici</a> pour vous inscrire</p>';
                                        }
                                echo '</div>
                            </div>
                        </div>
                    </div>
            </div>
        </form>';
    }
}