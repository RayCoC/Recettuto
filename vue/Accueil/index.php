<?php include_once "./vue/vue_Accueil.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/accueil.css">
    <!--<link rel="stylesheet" href="./CSS/accueil.css">-->
</head>

<!--<body>
    <div id="barreDeRecherche">
        <input type="text">
        <img src="./img/loupe.png">
    </div>
    <div id ="recette1">
        <img src = "./img/gateau.png">
        <img src = "./img/italie.png">
    </div>
    <div class ="CatégorieRecette">
        <h1 class = "TitreCatégorie"> Dernières recettes </h1>
        <img src="./img/Crepe.png">
        <img src ="./img/italiaDelRepas.png">
        <img src = "./img/Lasagne.png">
    </div>
    <div class= "CatégorieRecette">
        <h1 class="TitreCatégorie"> Recettes saisonnières</h1>
        <img src = "./img/Nouille.png">
        <img src = "./img/cake.png">
        <img src="./img/salade.png">
    </div>
    <div id = "ThemeRecette">
        <h1 class="TitreCatégorie">Thémes de Recettes </h1>
        <ul id="listeChoix">
            <li>Gateaux</li>
            <li>Patate</li>
            <li>Italie</li>
            <li>Genre</li>
        </ul>
    </div>
</body>
</html>-->
<!--    <body>
        <div class="search-box col-md-5">
            <form action="">
                <div class="input-group mb-3 " >
                    <div class="input-group-prepend center">
                        <button class="btn btn-light dropdown-toggle center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Category One</a>
                            <a class="dropdown-item" href="#">Category Two</a>
                            <a class="dropdown-item" href="#">Category Three</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated Category</a>
                        </div>
                    </div>
                    <input type="text" class="form-control center" aria-label="Search input with dropdown button">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button">Search</button>
                    </div>
                </div>
            </form>
        </div>-->
<!------ Include the above in your HEAD tag ---------->
<body>
<!-- <div class="container" style="margin-top: 8%;">
     <div class="col-md-6 col-md-offset-3">
         <div class="row">-->
<!--<div id="logo" class="text-center">
    <p>Search</p>
</div>-->
<!--<form role="form" id="form-buscar center">
    <div class="form-group">
        <div class="input-group">
            <input id="1" class="form-control" type="text" name="search" placeholder="Search..." required/>
            <span class="input-group-btn">
    <button class="btn btn-success" type="submit">
    <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
    </button>
    </span>
    </div>
</div>
</form>
</div>
</div>
</div>-->
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