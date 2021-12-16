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
            <input type= "submit" value = "Ajouter une recette">
        </div> 
        <div id="filter">
            <ul>
                <li><a href = "index.php?action=saison&module=mod_Recette">saison</a></li>
                <li><a href = "index.php?action=dessert"></a></li>
            </ul>
        </div>
    </body>
</html>