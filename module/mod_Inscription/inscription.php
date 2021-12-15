
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/inscription.css">
        <title>Inscription</title>
    </head>
    <body>

        <div id= centerDiv> 
        <article>
                <form action="index.php?action=inscription&module=mod_Inscription" method="post">
                    <h1>S'inscrire</h1>
                    
                    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" class=input>

                    <input type="text"  id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom d'utilisateur" class="input">

                    <input type="password" id="mdp" name="mdp" placeholder="Mot de passe" class="input">

                    <input type="password" id="confirmMdp" name="confirmMdp" placeholder="Confirmer mot de passe" class="input">                    

                    <input type="submit" id="valider" name="valider"class="input" value="Valider" >

                </form>

        </article>
        <aside>
                <img src="img/connexionIMG.png">
        </aside>
        </div>
    </body>
</html>
