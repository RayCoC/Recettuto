<?php
    if (!defined("CHECK_URL_INCLUDE")) {
        die("Interdit d'accès");

    }?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/voirRecette.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <title>Formulaire modification ingrédient</title>
</head>
    <div class="container mt-5">
        <div class="team-single">
            <div class="row">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img">
                        <img src=<?=$data['img']?> alt="">
                    </div>
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <p>Informations sur la recette </p>
                        <p class="sm-width-95 sm-margin-auto">recette ajouté le <?=$data['dateCrea']?> par <a href="index.php?action=profil&module=mod_Profil&login=<?=$data['user']?>"><?=$data['user']?></a></p>
                        <a class="btn btn-primary" style="background-color: #0EAF0B;" href="" role="button" id="like" value="<?=$_SESSION['idRecette']?>"><i class="fa fa-thumbs-up"></i></a>
                        <p id="nbLike">La recette a <?=$data['note']?> j'aime ! </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">Description</h4>
                        <p class="no-margin-bottom"><?=$data['desc']?></p>
                        <h4 class="font-size24 sm-font-size22 xs-font-size20">Temps et difficulté de la recette : </h4>
                        <div class="sm-no-margin">
                                <div class="row" id="partie2">
                                    <img src="./img/tmps.png">
                                    <p>Temps de preparation : <?= $data['tpsPrepa'] ?></p>
                                    <img src="./img/chapeau.png">
                                    <p class="float"> Difficulte : <?=$data['difficulte']?> </p>
                                    <img src="./img/time.png">
                                    <p>Temps de Cuisson : <?=$data['tpsCuisson']?> </p>
                                </div>
                            </div>
                        <h4 class="font-size24 sm-font-size22 xs-font-size20">Ingrédient de la recette : </h4>
                        <?php foreach ($data['ingredient'] as $item => $value) :?>
                            <p class="no-margin-bottom">- <?=$value['nomIngredient'] ." ". $value['quantite'] . " ". $value['unite']?> </p>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-0">
                    <div class="post-content">
                        <div class="post-container">
                            <?php if (isset($_SESSION['nomUtilisateur'])) : ?>
                            <div class="post-comment">
                                <input id="postComment" type="text" class="form-control" placeholder="Post a comment" name="avis" user=<?=$_SESSION['nomUtilisateur']?>>
                                <input type="submit" value="ajouter" id="ajouter">
                            </div><br>
    </form>
                            <?php endif;?>
                            <div id="comm">
                                <?php VueRecette::espaceCommentaire($data)?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
    $(document).ready(function() {
        $("#like").click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "index.php?action=like&module=mod_Recette",
                data: {
                    idRec: $("#like").attr('value'),
                },
                success : function (data) {
                    $("#nbLike").text("La recette a "+data+" j'aime !");
                }
            });
        });
    });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.deleteComm',function (e) {
                e.preventDefault();
                $("#comm").html('');
                $.ajax ({
                    type: "GET",
                    url: "index.php?action=supprimerCommentaire&module=mod_Recette",
                    data: {user : $(this).attr('data-user'), idAvis : $(this).attr('data-idAvis')},
                    success : function (data) {
                        $("#comm").append(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#ajouter").click(function (e) {
                    e.preventDefault();
                    $("#comm").html('');
                    $.ajax({
                        type: "GET",
                        url: "index.php?action=ajoutCommentaire&module=mod_Recette",
                        data : {user : $(this).attr("user"), avis : $("#postComment").val()},
                        success : function (data) {
                            $("#comm").append(data);
                        }
                    });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.likeCommentaire',function (e) {
                e.preventDefault();
                var a = $(this).attr("value");
                $("#nbLikeComment"+a).html("");
                $.ajax ({
                    type : "GET",
                    url: "index.php?action=likeCommentaire&module=mod_Recette",
                    data : {idAvis : a},
                    success : function (data) {
                        $("#nbLikeComment"+a).append(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click','.signaler',function (e) {
                e.preventDefault();
                var a = $(this).attr("value");
                $.ajax({
                    type : "GET",
                    url: "index.php?action=signalerCommentaire&module=mod_Recette",
                    data : {idAvis : $(this).attr('value')},
                    success : function (data) {
                        $("#signalement"+a).html('Signalé');
                    }
                });
            });
        });
    </script>