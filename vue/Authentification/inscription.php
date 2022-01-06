<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/inscription.css">
    <title>Inscription</title>
</head>
<body>
<div id= centerDiv>
    <article>
        <form action="index.php?action=inscriptionBD&module=mod_Authentification" method="post">
            <h1>S'inscrire</h1>

            <input type="radio" id="homme" name="sexe" value="homme">
            <label for="homme">Homme</label>
            <input type="radio" id="femme" name="sexe" value="femme">
            <label for="femme">Femme</label>
            <?php if(!isset($_POST["sexe"])){ echo "<p id='sexe' class='error'>Sexe n'est pas selectionner</p>";}?>

            <input type="number" id="number" name="age" placeholder="Age" value="<?php if(isset($_POST['age'])){ echo  $_POST['age'];}?>" class="input">
            <?php if(!isset($_POST["age"])){ echo "<p class='error'>Age n'est pas rempli</p>";}?>

            <input type="text" id="nom" name="nom" placeholder="Nom" value="<?php if(isset($_POST['nom'])){ echo  $_POST['nom'];}?>" class="input">
            <?php if(!isset($_POST["nom"])){ echo "<p class='error'>Nom n'est pas rempli</p>";}?>

            <input type="text" id="prenom" name="prenom" placeholder="Prenom" value="<?php if(isset($_POST['prenom'])){ echo  $_POST['prenom'];}?>" class="input">
            <?php if(!isset($_POST["prenom"])){ echo "<p class='error'>Prenom n'est pas rempli</p>";}?>

            <input type="text"  id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom d'utilisateur" value="<?php if(isset($_POST['nomUtilisateur'])){ echo  $_POST['nomUtilisateur'];}?>" class="input">
            <?php if(!isset($_POST["nomUtilisateur"])){ echo "<p class='error'>Nom d'utilisateur n'est pas rempli</p>";}?>

            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input">
            <?php if(!isset($_POST["mdp"])){ echo "<p class='error'>Mot de passe n'est pas rempli</p>";}?>


            <input type="submit" id="valider" name="valider"class="input" value="Valider" >

        </form>
    </article>
    <aside>
        <img src="img/inscription.jpg">
    </aside>
</div>
</body>
</html>