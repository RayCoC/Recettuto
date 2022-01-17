<?php
    include_once "./vue.php";
    class VueAccueil extends vue{

        function pageAccueil($data) {
            vue::render("Accueil/index.php",$data);
        }

        static function recettePopulaire($data){
            foreach ($data['Populaire'] as $item => $value){
                echo '';
            }
        }

        static function recetteRecent($data){
            foreach ($data['Recent'] as $item => $value){
                echo'<div class="col-md-4">
                       <a href="index.php?action=voirRecette&id='.$value['idRec'].'&module=mod_Recette"><img class="imgRecette card-img-top" src=' . $value['img'] . '></a>
                        <div class="card-body">
                            <h3 class="card-title">'.$value['titre'].'</h3>
                        </div class="card-body">
                    </div>';
            }
        }
    }