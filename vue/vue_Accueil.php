<?php
include_once "./vue.php";

class VueAccueil extends vue
{

    function pageAccueil($data)
    {
        vue::render("Accueil/index.php", $data);
    }

    static function recettePopulaire($data)
    {
        foreach ($data['Populaire'] as $item => $value) {
            echo ' <div class="col-md-6">
                <div class="block product no-border z-depth-2-top z-depth-2--hover">
                    <div class="block-image">
                        <a href="index.php?action=voirRecette&id=' . $value['idRec'] . '&module=mod_Recette">
                            <img  src="' . $value['img'] . '" class="img-center">
                        </a>
                        <span class="product-ribbon product-ribbon-right product-ribbon--style-1 bg-blue text-uppercase">Hot</span>
                    </div>
                    <div class="block-body text-center">
                        <h3 class="heading heading-5 strong-600 text-capitalize">
                            <a href="index.php?action=voirRecette&id=' . $value['idRec'] . '&module=mod_Recette">
                                Recette la plus populaire du mois
                            </a>
                        </h3>
                    </div>
                </div>
    
            </div>';
        }
    }

    static function recetteAleatoire($data)
    {
        foreach ($data['Aleatoire'] as $item => $value) {
            echo ' <div class="col-md-6">
                <div class="block product no-border z-depth-2-top z-depth-2--hover">
                    <div class="block-image">
                        <a href="index.php?action=voirRecette&id=' . $value['idRec'] . '&module=mod_Recette">
                            <img  src="' . $value['img'] . '" class="img-center">
                        </a>
                        <span class="product-ribbon product-ribbon-right product-ribbon--style-1 bg-blue text-uppercase">Random</span>
                    </div>
                    <div class="block-body text-center">
                        <h3 class="heading heading-5 strong-600 text-capitalize">
                            <a href="index.php?action=voirRecette&id=' . $value['idRec'] . '&module=mod_Recette">
                                Recette aléatoire
                            </a>
                        </h3>
                    </div>
                </div>
    
            </div>';
        }
    }

    static function recetteRecent($data)
    {
        foreach ($data['Recent'] as $item => $value) {
            echo '<li class="col-md-6 col-lg-4 project" data-groups="[&quot;skill1&quot;]">
                <div class="card mb-0">
                    <div class="project m-0">
                        <figure class="portfolio-item">
                            <a href="index.php?action=voirRecette&id=' . $value['idRec'] . '&module=mod_Recette" class="hovereffect">
                                <img class="img-responsive"  src="' . $value['img'] . '" alt="">
                                <div class="overlay">
                                </div><!-- / overlay -->
                            </a><!-- / hovereffect -->
                        </figure><!-- / portfolio-item -->
                    </div><!-- / project -->
                    <div class="card-body">
                        <a href="index.php?action=voirRecette&id=' . $value['idRec'] . '&module=mod_Recette" class="card-title title-link fs-16 fw-bold">' . $value['titre'] . '</a>
                    </div><!-- / card-body -->
                </div><!-- / card -->
            </li><!-- / project -->';
        }
    }

    static function typePlat($data)
    {
        foreach ($data['Plat'] as $item => $value) {
            echo '<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>' . $value['nomType'] . '</a></li>';
        }
    }
}