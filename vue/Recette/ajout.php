
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
            }function cacher(element) {
                if (element.style.display == "block") {
                    element.style.display = "none";
                    document.getElementById('submit').style.display = "block";
                }
                else {
                    element.style.display = "block";
                    document.getElementById('submit').style.display = "none";
                }
            }
        </script>
    </head>

    <body>
        <h1> Créez votre recette: </h1>
        <form method="post" action="index.php?action=form&module=mod_Recette" enctype="multipart/form-data">
            <div id="section1">
                <div id="image">
                    <p> Image de la recette</p>
                    <img src=/img/img.png id="output_image">
                    <input type="file" name="file" accept=".jpg, .jpeg, .png" id="cacherBouton" onchange="preview_image(event)"><br>
                    <input type="button" value="Choisir image" onclick="getfile();" class="submit">
                    <p id="format">Format : jpg, png, jpeg</p>
                </div>
                <div id="info1">
                    <p>Titre et description</p>
                    <label>Titre de la recette </label>
                    <input type = "text" name = "titre" class="hauteur" id="titre"><br><br>
                    <label> Description recette </label>
                    <textarea name="desc" cols="50" rows="10" placeholder="Description de votre recette ..."></textarea>
                </div>
            </div>
            <div id="section2">
                <div id="ingredients">
                    <p>Ingrédients et nombre de parts</p>
                    <label>Nombre de personnes</label>
                    <input type="range" name="portion" min="1" max="10"><br><br>
                    <label>Ingrédients</label>
                    <input type="button" value="Ajouter ingrédient !" onclick="cacher(document.getElementById('add'))" class="submit"><br>
                    <div id="add" class="hidden">
                        <input type="text" name="nomIngredient" class="info" placeholder="Ingredient">
                        <input type="text" name="quantite" id="quantite" class="info" placeholder="quantite">
                        <input type="text" name="unite" id="unite" class="info" placeholder="unite">
                        <input type="submit" value="ajouter" class="submit" name="add"><br><br>
                    </div>
                    <input type="submit" class="submit" name="voirListe" value="liste ingredients"><br><br>
                    <label>Hashtag</label>
                    <input type="button" value="ajouter Hashtag !" class="submit" onclick="cacher(document.getElementById('hashtag'))"><br>
                    <div id="hashtag" class="hidden">
                        <input type="text" name="hashtag" class="info" placeholder="Hashtag">
                        <input type="submit" value="ajouter" class="submit" name="addHashtag">
                    </div>
                    <input type="submit" value="Voir mes hashtags" class="submit" name="voirHashtag">
                </div>
                <div id="infoSupp">
                    <p>Informations supp</p>
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
                    <label>Hashtag</label>
                </div>
            </div>
            <div id="envoyer">
                <input type="submit" name="submit" value="Créer ma recette" class="submit">
            </div>
        </form>
<?php
if (VueRecette::messsageError()) {
    echo "<p class='error'>Tous les champs des ingrédients doivent etre entrés !</p>";
}
else if (isset($_POST['submit']))  {
    if (ControleurRecette::FormVide()) {
        echo "<p class='error'> Tous les champs doivent être remplis</p>";
    }
    else if (is_numeric($_POST['titre'])) {
        echo "<p class='error'>Titre de recette invalide !</p>";
    }
    else if (!is_numeric($_POST['calories'])) {
        echo "<p class='error'>Calories invalides !</p>";
    }
}
else if (isset($_POST['add'])) {
    if (is_numeric($_POST['nomIngredient'])) {
        echo "<p class='error'> Le nom de l'ingrédient est invalide !</p>";
    }
    else if (!is_numeric($_POST['quantite'])) {
        echo "<p class='error'> Les quantites sont invalides !</p>";
    }
    else if (is_numeric($_POST['unite'])) {
        echo "<p class='error'>Les unitées sont invalides</p>";
    }
    else if (!ModeleRecette::verifieDoublon($_POST['nomIngredient'])) {
        echo "<p class='error'> Duplication de l'ingredient !</p>";
    }
}
?>