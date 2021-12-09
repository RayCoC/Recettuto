
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/connexion.css">
        <title>Connexion</title>
    </head>
    <body>

        <div id= centerDiv> 
        <aside>
                <img src="img/connexionIMG.png">
        </aside>
        <article>
                <form action="index.php?action=connexion&module=mod_Connexion" method="post">
                    <h1>Creer un compte</h1>
                    
                    <input type="text"  id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom d'utilisateur" class="input">

                    <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input">
                    <p>Vous n'avez pas de compte ? cliquez <a href = "index.php?action=inscription=module=mod_Connexion">ici</a> pour vous inscrire</p>
                    <input type="submit" id="valider" name="valider"class="input" value="Valider" >

                </form>

        </article>
        </div>
    </body>
</html>