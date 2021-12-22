<!DOCTYPE html>
<html>  
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/ajout.css">
        <title>Ajout Recette</title>
        <script type="text/javascript">
            function getfile(){
                document.getElementById('cacherBouton').click();
            }
        </script>
    </head>

    <body>
        <h1> Créez votre recette: </h1>
        <form method="post" action="index.php?action=ajout&module=mod_Recette">
            <div id="section1">
                <div id="info1">
                    <p>Titre et description</p>
                    <label>Titre de la recette </label>
                    <input type = "text" name = "titre" class="hauteur" id="titre"><br><br>
                    <label> Description recette </label>
                    <textarea name="desc" cols="50" rows="10" placeholder="Description de votre recette ..."></textarea>
                </div>
                <div id="image">
                    <p> Image de la recette</p>
                    <img src="./img/image-content.jpg">
                    <input type ="file" name = "file" accept=".jpg, .jpeg, .png" id="cacherBouton" onchange="getvalue()"><br>
                    <input type="button" value="Choisir image" onclick="getfile();" class="submit"/>
                    <p id="format">Format : jpg, png, jpeg</p>
                </div>
            </div>
            <div id="section2">
                <div id="ingredients">
                    <p>Ingrédients et nombre de parts</p>
                    <label>Nombre de personnes</label>
                    <input type="range" name="portion" min="1" max="10"><br><br>
                    <label>Ingrédients</label>
                    <textarea name="ingredient" cols="50" rows="10" placeholder="La liste d'ingrédient par ligne"></textarea>
                </div>
                <div id="infoSupp">
                    <p>Informations supplémentaires</p>
                    <label>Durée de la recette </label>
                    <input type = "date" name = "date" class = "hauteur"><br><br>
                    <label> Calories </label>
                    <input type = "text" name = "calories" class = "hauteur"><br><br>
                    <label> Temps prépa </label>
                    <input type = "date" name = "cuisson" class="hauteur"><br><br>
                    <label> Difficulté </label>
                    <input type="range" id="volume" name="volume" min="1" max="3">
                </div>
            </div>
            <input type="submit" name="send" value="Créer ma recette" class="submit" id="envoyer">
        </form>