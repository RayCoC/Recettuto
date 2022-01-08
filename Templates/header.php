<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/header.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0EAF0B;" >
            <div class="container-fluid">
                <div class="text-center">
                    <div class="topnav-centered">
                    <a class="navbar-brand" href="index.php?module=ModAccueil" id="titre" >Recettuto</a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                        <img src="./img/RecettutoIMG.png" class="userConnection">
                    </ul>
                    <span class="navbar-text">  <li class="nav-item dropdown" style="list-style: none">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src = "./img/user.png" class="userConnection"></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="min-width: 0;">
                            <?php
                            require_once "module/mod_Authentification/controleur_Authentification.php";
                            if(ControleurAuthentification::test_Connexion()) {
                                echo '<li><a class="dropdown-item" href="index.php?action=inscription&module=mod_Authentification" style="color: black;">Mon Compte</a></li>
                                   <li><a class="dropdown-item" href="index.php?action=deconnexion&module=mod_Authentification" style="color: black;">Deconnexion</a></li>';
                            }
                            else {
                                echo '<li><a class="dropdown-item" href="index.php?action=inscription&module=mod_Authentification" style="color: black;">Inscription</a></li>
                                 <li><a class="dropdown-item" href="index.php?action=connexion&module=mod_Authentification" style="color: black;">Connexion</a></li>';
                            }?>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
        <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" class="link-dark" href="index.php?action=Accueil&module=mod_Accueil">Accueil |</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=Recette&module=mod_Recette">Recettes |</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listeEquipe&module=mod_Nutrition">Nutrition</a>
                </li>
            </ul>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>