<?php 
include_once './vue.php';
class VueRecette extends vue {
    private $modeleRecette;

    function __construct () {
        $this-> modeleRecette= new ModeleRecette();
    }
    function pageModifierIngredient($token) {
        vue::render("Recette/Update/modifierIngredient.php", null, $token);
    }
    function recettePrincipal() {
        vue::render("Recette/index.php");
    }
    function pageAjout($token) {
        vue::render("Recette/ajout.php", null, $token);
    }
    function  pageModifierHashtag($token) {
        vue::render("Recette/Update/modifierHash.php", null, $token);
    }
    function pageAjoutVide() {
        vue::render("Recette/Error/ajoutVide.php");
    }
    function listHashtag() {
        vue::render('Recette/listHashtag.php');
    }
    function listeIngredient() {
        vue::render("Recette/listIngredient.php");
    }
    function  pageAjoutIngredient() {
        vue::render("Recette/ajoutIngredient.php");
    }
    function pageVoirRecette($data) {
        vue::render("Recette/voirRecette.php",$data);
    }
    static function afficheRecettes($data = []) {
        if ($data !=null) {
            foreach ($data['Recette'] as $item => $value) {
                echo '<div class="col-md-4">
                       <a href=index.php?action=voirRecette&id=' . $value['id'] . '&module=mod_Recette><img class="imgRecette card-img-top" src=' . $value['img'] . '></a>
                        <div class="card-body">
                            <h3 class="card-title">'.$value['titre'].'</h3>
                        </div class="card-body">
                    </div>';
            }
        }
        else {
            echo '<div class="alert alert-danger alert-dismissible fade show">
    <h4 class="alert-heading">Oops! Something went wrong.</h4>
    <p>Please enter a valid value in all the required fields before proceeding. If you need any help just place the mouse pointer above info icon next to the form field.</p>
    <hr>
    <p class="mb-0">Once you have filled all the details, click on the button to continue.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>';
        }
    }
    static function espaceCommentaire($data) {
        echo '<div class="post-detail">';
                               if (!empty($data['avis'])) {
                                    foreach ($data['avis'] as $item => $value) {
                                        if (ControleurRecette::checkCreateurRecette() or $value['user']==$_SESSION['nomUtilisateur']) {
                                        echo '<ul class="list-inline m-0" style="float: right">
                                            <li class="list-inline-item">
                                                <a id="deleteComm" data-user ='.$value['user'].' data-idAvis='.$value['idAvis'].' class= "btn text-red deleteComm" href=""><i class="fa fa-trash"></i></a>
                                            </li>
                                        </ul>';
                                        }
                                        echo '<h5><a class="profile-link">'.$value['user'].'</a></h5>
                                        <p>'.$value['message'].'</p>
                                        <a class="btn text-green" id="likeCommentaire" value='.$value['idAvis'].'><i class="fa fa-thumbs-up"></i></a>';
                                    }
                            echo '</div>';
                               }
    }
}