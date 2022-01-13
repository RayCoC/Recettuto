<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/voirRecette.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <title>Formulaire modification ingrédient</title>
</head>
<body>
    <div class="container mt-5">
        <div class="team-single">
            <div class="row">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img">
                        <img src=<?=$data['img']?> alt="">
                    </div>
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                        <p>Informations sur la recette </p>
                        <p class="sm-width-95 sm-margin-auto">recette ajouté le <?=$data['dateCrea']?> par <a href="#"><?=$data['user']?></a></p>
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
    <form action="index.php?action=ajoutCommentaire&id=<?=$_SESSION['idRecette']?>&module=mod_Recette" method="post">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-0">
                    <div class="post-content">
                        <div class="post-container">
                            <?php if (isset($_SESSION['nomUtilisateur'])) : ?>
                            <div class="post-comment">
                                <input type="text" class="form-control" placeholder="Post a comment" name="avis">
                            </div><br> <?php endif; ?>
                            <div class="post-detail">
                               <?php if (!empty($data['avis'])) :  ?>
                                    <?php foreach ($data['avis'] as $item => $value) : ?>
                                        <ul class="list-inline m-0" style="float: right">
                                            <li class="list-inline-item">
                                                <a id="updateComm" href="index.php?action=modifierCommentaire&id=<?=$value['idAvis']?>t&module=mod_Recette"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a id="deleteComm" class= "btn text-red"href="index.php?action=supprimerCommentaire&id=<?=$value['idAvis']?>&module=mod_Recette"><i class="fa fa-trash"></i></a>
                                            </li>
                                        </ul>
                                        <h5><a href="timeline.html" class="profile-link"><?=$value['user']?></a></h5>
                                        <p><?=$value['message']?></p>
                                        <a class="btn text-green" id="likeCommentaire" value="<?=$_SESSION['idRecette']?>"><i class="fa fa-thumbs-up"></i></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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