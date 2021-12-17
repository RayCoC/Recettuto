<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/RecettePrincipal.css">
    </head>
    <body>
        <div id="barreDeRecherche">
            <input type="text" placeholder="Recherchez un tag, recette ...">
            <img src="./img/loupe.png">
        </div>
        <div id = "ajout">
            <p> Si vous souhaitez ajouter une recette sur notre site veuillez cliquez sur Ajouter une recette ! </p>
            <form action = "index.php?action=pageAjout&module=mod_Recette" method="post">
                <input type= "submit" value = "Ajouter une recette">
            </form>
        </div> 
        <div id="myBtnContainer">
            <a class="btn active" href="index.php?action=Repas&module=mod_Recette">Récent</a>
            <a class="btn" href="index.php?action=Dessert&module=mod_Recette">Dessert</a>
            <a class="btn" href="index.php?action=Repas&module=mod_Recette">Repas</a>
            <a class="btn" href="index.php?action=Dej&module=mod_Recette">Petit déjeuner</a>
            <a class="btn" href="index.php?action=Diner&module=mod_Recette">Diner</a>
            <a class="btn" href="index.php?action=Populaire&module=mod_Recette">Populaires</a>
        </div>
