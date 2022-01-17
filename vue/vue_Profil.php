<?php
include_once "./vue.php";
class VueProfil extends vue{

    function Profil($data) {
        vue::render("Profil/profil.php", $data);
    }

    function modifProfil() {
        vue::render("Profil/modifierProfil.php");
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
                        <button id="ban" name="bannir" onclick="bannir('.$value['idAvis'].')">Bannir</button>
                        <button id="annulerBan" name="annuler" onclick="annuler('.$value['idAvis'].')">Annuler </button>
                        <div class="cart-item-product-thumb"><p>'.$value['utilisateur'].'</p></div>
                        <div class="cart-item-product-info">
                            <h4 class="cart-item-product-title"> '.$value['textAvis'].'</h4>
                        </div>
                    </a>
                </div>
            </div>';
        }
    }
    static function profilVide($message) {
        echo '<div class="container mb-4">
                <div class="row">
                    <div class="col-lg-8 pb-5">
                    <!-- Item-->
        
                        <div class="cart-item d-md-flex justify-content-between"><i class="fa fa-times"></i></span>
                            <div class="px-3 my-3">
                                <a class="cart-item-product" href="#">
            
                                    <div class="cart-item-product-info">
                                        <h4 class="cart-item-product-title">Vous n\'avez pas '.$message.'</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
             </div>';
    }
    static function profilSettings($data) {
        echo '<div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Prénom</label>
                        <input class="form-control" type="text" id="account-fn" value="'.$data['utilisateur']['prenom'].'"  name="prenom" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Nom</label>
                        <input class="form-control" type="text" id="account-ln" value="'.$data['utilisateur']['nom'].'" name="nom">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-password">Mot de passe</label>
                        <input class="form-control" type="password" id="account-password" value="" name="password" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Age</label>
                        <input class="form-control" type="number" id="account-age" value="'.$data['utilisateur']['age'].'" name="age" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Sexe</label>
                        <div class="form-check form-check-inline mb-0 me-4">
                            <input type="radio" id="homme" name="sexe" value="homme" checked>
                            <label for="homme">Homme</label>
                            <input type="radio" id="femme" name="sexe" value="femme">
                            <label for="femme">Femme</label>
                        </div>
                    </div>
                </div>';
    }
}