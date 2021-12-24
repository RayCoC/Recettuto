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
            function preview_image(event)
            {
                var reader = new FileReader();
                reader.onload = function()
                {
                    var output = document.getElementById('output_image');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
    </head>

    <body>
        <h1> Créez votre recette: </h1>
        <form method="post" action="index.php?action=ajout&module=mod_Recette" enctype="multipart/form-data">
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
                        <img src=/img/img.png id="output_image">
                        <input type="file" name="file" accept=".jpg, .jpeg, .png" id="cacherBouton" onchange="preview_image(event)"><br>
                        <input type="button" value="Choisir image" onclick="getfile();" class="submit">
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
                    <label>Type de plat</label>
                    <select name="typePlat">
                        <option value="0">Petit-Déjeuner</option>
                        <option value="1">Repas</option>
                        <option value="2">Diner</option>
                        <option value="3">Dessert</option>
                    </select><br><br>
                    <label>Temps cuisson</label>
                    <input type = "time" name = "tpsCuisson" class = "hauteur"><br><br>
                    <label> Calories </label>
                    <input type = "text" name = "calories" class = "hauteur"><br><br>
                    <label>Temps prépa</label>
                    <input type = "time" name = "cuisson" class="hauteur"><br><br>
                    <label> Difficulté </label>
                    <input type="range" id="volume" name="difficulte" min="1" max="3">
                </div>
            </div>
            <input type="submit" name="submit" value="Créer ma recette" class="submit" id="envoyer">
        </form>