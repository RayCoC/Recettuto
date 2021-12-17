<!DOCTYPE html>
<html>  
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/ajout.css">
    </head>

    <body>
        <p> Formulaire d'ajout de recette : </p>
        <form method="post" action="index.php?action=ajout&module=mod_Recette">
            <label> Nom de la recette </label>
            <input type = "text" name = "titre"><br>
            <label>Durée de la recette </label>
            <input type = "date" name = "date"><br>
            <label> Image </label>
            <input type ="file" name = "file"><br>
            <label> Calories </label>
            <input type = "text" name = "calories"><br>
            <label> Temps prépa </label>
            <input type = "date" name = "cuisson"><br>
            <label> Déscription recette </label>
            <input type = "text" name = "desc"><br>
            <label> Difficulté </label>
            <input type="range" id="volume" name="volume" min="1" max="3"><br>
        </form>