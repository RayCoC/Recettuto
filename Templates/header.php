<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/header.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <header id="head">
            <div id="headTitle">
                <img src="./img/RecettutoIMG.png">
                <a href="index.php?action=Accueil&module=mod_Accueil" id="Titre">Recettuto</a>
            </div>
            <ul id="menu-demo2">
                    <li><img src = "./img/user.png" id="userConnection">
                        <ul>
                            <?php
                            require_once "module/mod_Authentification/controleur_Authentification.php";
                                if (ControleurAuthentification::test_Connexion()) {
                                    echo '<li class="sousListe"><a href="index.php?action=inscription&module=mod_Authentification">Mon Compte</a></li><br>';
                                    echo '<li class="sousListe"><a href="index.php?action=deconnexion&module=mod_Authentification">Deconnexion</a></li>';
                                }
                                else {
                                    echo '<li class="sousListe"><a href="index.php?action=inscription&module=mod_Authentification">Inscription</a></li><br>';
                                    echo '<li class="sousListe"><a href="index.php?action=connexion&module=mod_Authentification">Connexion</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
            </ul>
        </header>
        <nav>
            <a href="index.php?action=Accueil&module=mod_Accueil">Accueil</a> |
            <a href="index.php?action=Recette&module=mod_Recette">Recettes</a> |
            <a href = "index.php?action=Nutrition&module=mod_Nutrition">Nutrition</a>
        </nav>
    </body>
</html>