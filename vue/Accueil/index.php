<?php include_once "./vue/vue_Accueil.php"; ?>
<?php
    if (!defined("CHECK_URL_INCLUDE")) {
        die("Interdit d'accès");

    }?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/accueil.css">
</head>
<div class="container">
    <br/>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm">
                <div class="card-body row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body"></i>
                    </div>
                    <!--end of col-->
                    <div class="col">
                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Hashtag, Ingredient ...">
                    </div>
                    <!--end of col-->
                    <div class="col-auto">
                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                    </div>
                    <!--end of col-->
                </div>
            </form>
        </div>
        <!--end of col-->
    </div>
</div>

<div class="container">
    <div class="row">
        <?php VueAccueil::recettePopulaire($data);?>
        <?php VueAccueil::recetteAleatoire($data);?>
    </div>
</div>

<div class ="CatégorieRecette">
    <h1 class="TitreCatégorie"> Recettes les plus récentes</h1>
    <div class="container">
        <ul class="row portfolio list-unstyled mb-0 boxed-portfolio">
            <?php VueAccueil::recetteRecent($data);?>
        </ul>
    </div>
</div>

<div id = "ThemeRecette">
    <section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h2>Type Plat</h2>
                    <ul class="list-unstyled quick-links">
                        <?php VueAccueil::typePlat($data);?></ul>
                </div>
            </div>
        </div>
    </section>
</div>