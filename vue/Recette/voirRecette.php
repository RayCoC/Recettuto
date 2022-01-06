<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/voirRecette.css">
    <title>Formulaire modification ingrédient</title>
</head>

<body>
        <div id="en-tete" class="center">
            <h1><?= $data['nomRecette'] ?></h1>
            <p>Ajouté le : <?= $data['dateCrea']?></p>
            <img id="imgRecette" src=<?= $data['img']?>>
        </div>
        <div id="partie2" class="center">
            <img src="./img/tmps.png">
            <p>Temps de preparation : <?= $data['tpsPrepa'] ?></p>
            <img src="./img/chapeau.png">
            <p class="float"> Difficulte : <?=$data['difficulte']?> </p>
            <img src="./img/time.png"
            <p class="float"> Cuisson : <?=$data['tpsCuisson']?> </p>
        </div>
        <div id="difficulte" class="center">
            <h1> Description : </h1>
            <p><?=$data['desc']?></p>
        </div>
        <div id="ingredient">
            <h1>Ingrédients : </h1>
                <?php foreach ($data['ingredient'] as $item => $value) :?>
                    <p><?=$value['nomIngredient'] ." ". $value['quantite'] . " ". $value['unite']?> </p><br>
                <?php endforeach;?>
        </div>
        <div>
            <h1>Avis : </h1>
                <?php if (!empty($data['avis'])) :  ?>
                <?php foreach ($data['avis'] as $item => $value) : ?>
                    <p><?=$value['user']?>></p>
                <?php endforeach; ?>
                <?php endif; ?>
            <form href="index.php?action=ajoutCommentaire&module=mod_Recette" method="post">
                <p>Ecrire un commentaire  : </p>
                <textarea name="addCommentaire"></textarea>
                <input type="submit" value="ajouter">
            </form>
        </div>