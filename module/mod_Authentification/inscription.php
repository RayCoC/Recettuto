
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
                    
                    <input type="radio" id="homme" name="sexe" value="homme">
                    <label for="homme">Homme</label> 

                    <input type="radio" id="femme" name="sexe" value="femme">
                    <label for="femme">Femme</label>

                    <label for="start" id="dateNaissance">Date de naissance</label>
                    <input type="date" id="start" name="trip-start" value="2018-07-22" min="1940-01-01" max="2021-12-31">


                    <input type="email" id="email" name="email" placeholder="exemple@gmail.com" class=input>

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
