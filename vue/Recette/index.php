<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./CSS/RecettePrincipal.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="index.php?action=rechercher&module=mod_Recette" method="post">
            <div class="input-group mb-3 mt-10">
                <div class="input-group-text p-0">
                    <select class="form-select form-select-lg shadow-none bg-light border-0" name="filtre" id="filtre">
                        <option value="titre">Nom Recette</option>
                        <option value="hashtag">Hashtag</option>
                        <option value="ingredient">Ingredient</option>
                    </select>
                </div>
                <input type="text" class="form-control" placeholder="Search Here" name="recherche" id="search">
                <button class="input-group-text shadow-none px-4 btn-success">
                    <i class="bi bi-search"></i>
                </button>
        </form>
        </div>
        <div class="col-12 container">
            <div class="alert mb-5 py-4 green1" role="alert">
                <div class="d-flex">
                    <div class="px-3" id="addRec">
                        <p class="text-light font-weight-bold">Vous souhaitez vous aussi participer et ajouer une recette ? Cliquez simplement sur le bouton ajouter une recette !</p>
                        <div class="center">
                            <?php if (isset($_SESSION['nomUtilisateur'])) :?>
                                <a href="index.php?action=pageAjout&module=mod_Recette" class="btn btn-green mx-1 green center"> Ajouter une recette !</a>
                            <?php else: ?>
                                <a href="index.php?action=connexion&module=mod_Authentification" class="btn btn-green mx-1 green center"> Me creer un compte !</a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myBtnContainer">
            <input type="submit" class="btn" onclick="filtre(this.value)" value="Recent">
            <input type="submit" class="btn" onclick="filtre(this.value)" value="Dessert">
            <input type="submit" class="btn" onclick="filtre(this.value)" value="Repas">
            <input type="submit" class="btn" onclick="filtre(this.value)" value="Petit-Dejeuner">
            <input type="submit" class="btn" onclick="filtre(this.value)" value="Diner">
            <input type="submit" class="btn" onclick="filtre(this.value)" value="Populaire">
        </div>
        <div class="container mt-5" >
            <div class="card-group">
                <div class="row" id="test">
                </div>
            </div>
        </div>
    <script>
        function filtre(val) {
            var filtre;
            if (val == "Dessert") {
                filtre = 1;
            }
            else if (val == "Repas") {
                filtre = 2;
            }
            else if (val == "Petit-Dejeuner") {
                filtre = 3;
            }
            else if (val == "Diner") {
                filtre = 4;
            }
            else {
                filtre = val;
            }
            $("#test").html('');
            $.ajax({
                url: "/index.php?action=filtre&module=mod_Recette",
                type : "GET",
                data : {"value" : filtre},
                success : function (data) {
                    $("#test").append(data);
                }
            });
        }
    </script>