<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/header.css">
    </head>

    <body>
        <header id="head">
            <div id="headTitle">
                <img src="./img/RecettutoIMG.png">
                <a href="index.php?action=Accueil&module=mod_Accueil" id="Titre">Recettuto</a>
            </div>
            <ul id="menu-demo2">
                    <li><img src = "./img/user.png" id="userConnection" </img>
                        <ul>
                            <li class="sousListe"><a href="index.php?action=inscription&module=mod_Connexion">Inscription</a></li><br>
                            <li class="sousListe"><a href="index.php?action=connexion&module=mod_Connexion">Connexion</a></li>
                        </ul>
                    </li>
            </ul>
        </header>
        <nav>
            <a href="index.php?action=Accueil&module=mod_Accueil">Accueil</a> |
            <a href="index.php?action=liste&module=mod_Recette">Recettes</a> |
            <a href = "index.php?action=listeEquipe&module=mod_Nutrition">Nutrition</a>
        </nav>
    </body>
</html>