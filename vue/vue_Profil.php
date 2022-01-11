<?php
include_once "./vue.php";
class VueProfil extends vue{

    function Profil($data) {
        vue::render("Profil/profil.php", $data);
    }

    function modifProfil() {
        vue::render("Profil/modifierProfil.php");
    }

    function mesRecettes($data){
        vue::render("Profil/mesRecettes.php", $data);
    }

    function abonnements($data){
        vue::render("Profil/abonnements.php", $data);
    }

   static function afficheRecettes($data){
        foreach ($data as $item => $value) {
          echo  '<div class="cart-item d-md-flex justify-content-between"><i class="fa fa-times"></i></span>
                <div class="px-3 my-3">
                    <a class="cart-item-product" href="#">
                        <div class="cart-item-product-thumb"><img src=' . $value['img'] . ' alt="Product"></div>
                        <div class="cart-item-product-info">
                            <h4 class="cart-item-product-title"> '.$value['titre'].'</h4>
                            <div class="text-lg text-body font-weight-medium pb-1">'.$value['date'].' </div><div></div>Difficulté: <span class="text-success font-weight-medium">'.$value['difficulte'].'</div>
                        </div>
                    </a>
                </div>
            </div>';
            
          }
    }

    static function afficheAbonnements($data){
        foreach ($data as $item => $value) {
            echo  '<div class="cart-item d-md-flex justify-content-between"><i class="fa fa-times"></i></span>
                <div class="px-3 my-3">
                    <a class="cart-item-product" href="#">
                       
                        <div class="cart-item-product-info">
                            <h4 class="cart-item-product-title"> '.$value['abo'].'</h4>
                            
                        </div>
                    </a>
                </div>
            </div>';

        }
    }
}