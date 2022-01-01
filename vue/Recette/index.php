<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/RecettePrincipal.css">
    </head>
    <body>
        <div id="barreDeRecherche">
            <form action="index?action=rechercher&module=mod_Recette" method="post">
                <div id="searchBar">
                    <input type="text" name="recherche" placeholder="Recherchez un tag, recette ..." id="barreDeRecherche" class="inp">
                    <select name="filtre">
                        <option value="hashtag">Hashtag</option>
                        <option value="titre">Nom recette</option>
                        <option value="ingredient">ingredient</option>
                    </select>
                </div>
                <div id="search">
                    <input type="submit" name="search" class="submit" value="rechercher">
                </div>
            </form>
        </div>
        <div id = "ajout">
            <p> Si vous souhaitez ajouter une recette sur notre site veuillez cliquez sur Ajouter une recette ! </p>
            <form action = "index.php?action=pageAjout&module=mod_Recette" method="post">
                <input type= "submit" value = "Ajouter une recette" class="inp">
            </form>
        </div> 
        <div id="myBtnContainer">
            <select>
                <option class="btn active"><a class="btn active" href="index.php?action=Repas&module=mod_Recette">Récent</a></option>
                <option><a class="btn" href="index.php?action=Dessert&module=mod_Recette">Dessert</a></option>
            </select>
            <a class="btn active" href="index.php?filtre=Recent&mod_Recette">Récent</a>
            <a class="btn" href="index.php?filtre=Dessert&module=mod_Recette">Dessert</a>
            <a class="btn" href="index.php?filtre=Repas&module=mod_Recette">Repas</a>
            <a class="btn" href="index.php?filtre=Dej&module=mod_Recette">Petit déjeuner</a>
            <a class="btn" href="index.php?filtre=Diner&module=mod_Recette">Diner</a>
            <a class="btn" href="index.php?filtre=Populaire&module=mod_Recette">Populaires</a>
        </div>
        <?php VueRecette::afficheRecettes($data['Recette']);?>
