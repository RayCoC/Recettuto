<?php
if (!defined("CHECK_URL_INCLUDE")) {
    die("Interdit d'accès");

} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/ajout.css">
    <title>Liste des Hashtag</title>
    <link rel="stylesheet" href="./CSS/accueil.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<h1>Liste des hashtag : </h1>
<section class="pb-10 header text-center">
    <div class="container py-10 text-white">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">

                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                </tr>
                                </thead>
                                <?php
                                if (!empty($_SESSION['hashtag'])):?>
                                    <tbody>
                                <tr>
                                    <?php foreach ($_SESSION['hashtag'] as $item => $value) : ?>
                                        <th scope="row"><?= $value['nomHashtag'] ?></th>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="index.php?action=modifierHashtag&hashtag=<?= $value['nomHashtag'] ?>&module=mod_Recette"><i
                                                                class="fa fa-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="index.php?action=supprimerHashtag&hashtag=<?= $value['nomHashtag'] ?>&module=mod_Recette"><i
                                                                class="fa fa-trash"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                        </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form action="index.php?action=pageAjout&module=mod_Recette" method="post">
    <input type="submit" value="revenir en arriere" class="submit">
</form>
