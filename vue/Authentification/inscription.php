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

            <input type="number" id="number" name="age" placeholder="Age" class="input">
            <input type="text" id="nom" name="nom" placeholder="Nom" class="input">

            <input type="text" id="prenom" name="prenom" placeholder="Prenom" class="input">
            <input type="text"  id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom d'utilisateur" class="input">
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input">
            <input type="password" id="confirmMdp" name="confirmMdp" placeholder="Confirmer mot de passe" class="input">

            <input type="submit" id="valider" name="valider"class="input" value="Valider" >

        </form>
    </article>
    <aside>
        <img src="img/inscription.jpg">
    </aside>
</div>
</body>
</html>