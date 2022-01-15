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

    function commentaires($data){
        vue::render("Profil/commentaires.php", $data);
    }

    function signalements($data){
        vue::render("Profil/signalements.php", $data);
    }

    function profilVide($data){
        vue::render("Profil/profilVide.php", $data);
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
                    <a class="cart-item-product" href="index.php?action=mesRecettes&module=mod_Profil&login='.$value['abo'].'">
                       
                        <div class="cart-item-product-info">
                            <h4 class="cart-item-product-title"> '.$value['abo'].'</h4>
                            
                        </div>
                    </a>
                </div>
            </div>';

        }
    }

    static function afficheCommentaires($data){
        foreach ($data as $item => $value) {
            echo  '<div class="cart-item d-md-flex justify-content-between"><i class="fa fa-times"></i></span>
                <div class="px-3 my-3">
                    <a class="cart-item-product" href="index.php?action=voirRecette&id='.$value['idRec'].'&module=mod_Recette">
                        <div class="cart-item-product-info">
                            <h4 class="cart-item-product-title"> '.$value['nomRec'].'</h4>
                            <div class="text-lg text-body font-weight-medium pb-1">'.$value['textAvis'].' </div>
                            <div>Note : <span class="text-success font-weight-medium">'.$value['nbEtoiles'].'</div>
                            <div>Nombre de pouce bleu : <span class="text-success font-weight-medium">'.$value['nbPouceBleu'].'</div>
                        </div>
                    </a>
                </div>
            </div>';

        }
    }

    static function afficheSignalements($data){
        foreach ($data as $item => $value) {
            echo  '<div class="cart-item d-md-flex justify-content-between"><i class="fa fa-times"></i></span>
                <div class="px-3 my-3">
                    <a class="cart-item-product" href="#">
                    <form action="index.php?action=bannir&module=mod_Profil&login='.$_GET['login'].'" method="post"><input type="submit" name="pipi" value="Bannir" ><input type="hidden" value="'.$value['idAvis'].'" name="idAvis"></form>
                    <form action="index.php?action=annulerSignalement&module=mod_Profil&login='.$_GET['login'].'" method="post"><input type="submit" name="caca" value="Enlever" ><input type="hidden" value="'.$value['idAvis'].'"  name="idAvis"></form>
                        <div class="cart-item-product-thumb"><p>'.$value['utilisateur'].'</p></div>
                        <div class="cart-item-product-info">
                            <h4 class="cart-item-product-title"> '.$value['textAvis'].'</h4>
                        </div>
                    </a>
                </div>
            </div>';
        }
    }
}