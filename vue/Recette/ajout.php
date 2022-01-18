

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
                <div class="row">
                    <div class="col-md-6 how-img" id="image">
                        <img src=./img/img.png id="output_image"/>
                        <input type="file" name="file" accept=".jpg, .jpeg, .png" id="cacherBouton" onchange="preview_image(event)"><br>
                        <input type="button" value="Choisir image" onclick="getfile();" class="submit">
                        <p id="format">Format : jpg, png, jpeg</p>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Titre de la recette</label>
                            <input name = "titre" class="form-control" id="exampleFormControlInput1" value="<?php if(isset($_POST['titre'])){ echo  $_POST['titre'];}?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" rows="3" name="desc"><?php if(isset($_POST['desc'])){ echo  $_POST['desc'];}?></textarea>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Ingrédients et nombre de parts</p>
                        <label>Nombre de personnes</label>
                        <input type="range" name="portion" min="1" max="10"><br><br>
                        <label>Ingrédients</label>
                        <input type="button" value="Ajouter ingrédient !" onclick="cacher(document.getElementById('add'))" class="submit"><br>
                        <div id="add" class="hidden">
                            <input type="text" name="nomIngredient" class="info" placeholder="Ingredient" value="<?php if(isset($_POST['nomIngredient'])){ echo  $_POST['nomIngredient'];}?>">
                            <input type="text" name="quantite" id="quantite" class="info" placeholder="quantite" value="<?php if(isset($_POST['quantite'])){ echo  $_POST['quantite'];}?>">
                            <input type="text" name="unite" id="unite" class="info" placeholder="unite" value="<?php if(isset($_POST['unite'])){ echo  $_POST['unite'];}?>">
                            <input type="submit" value="ajouter" class="submit" name="add"><br><br>
                        </div>
                        <input type="submit" class="submit" name="voirListe" value="liste ingredients"><br><br>
                        <label>Hashtag</label>
                        <input type="button" value="ajouter Hashtag !" class="submit" onclick="cacher(document.getElementById('hashtag'))"><br>
                        <div id="hashtag" class="hidden">
                            <input type="text" name="hashtag" class="info" placeholder="Hashtag" value="<?php if(isset($_POST['hashtag'])){ echo  $_POST['hashtag'];}?>">
                            <input type="submit" value="ajouter" class="submit" name="addHashtag">
                        </div>
                        <input type="submit" value="Voir mes hashtags" class="submit" name="voirHashtag">
                    </div>
                    <div class="col-md-6">
                        <p>Informations supp</p>
                        <label>Type de plat</label>
                        <select name="typePlat">
                            <option value="2">Petit-Déjeuner</option>
                            <option value="3">Repas</option>
                            <option value="4">Diner</option>
                            <option value="1">Dessert</option>
                        </select><br><br>
                        <label>Temps cuisson</label>
                        <input type = "time" name = "tpsCuisson" class = "hauteur"><br><br>
                        <label> Calories </label>
                        <input type = "text" name = "calories" class = "hauteur" value="<?php if(isset($_POST['calories'])){ echo  $_POST['calories'];}?>"><br><br>
                        <label>Temps prépa</label>
                        <input type = "time" name = "cuisson" class="hauteur"><br><br>
                        <label> Difficulté </label>
                        <input type="range" id="volume" name="difficulte" min="1" max="3">
                    </div>
                </div>
            <div id="envoyer">
                <input type="hidden" value="<?=$token['token']?>" name="token">
                <input type="submit" name="submit" value="Créer ma recette" class="submit">
            </div>
        </form>
<?php
if (ModeleRecette::messsageError()) {
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
    else if (!ModeleRecette::verifieDoublon($_POST['nomIngredient'], 'ingredient', 'nomIngredient')) {
        echo "<p class='error'> Duplication de l'ingredient !</p>";
    }
}?>