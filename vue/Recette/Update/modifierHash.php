<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/ajout.css">
    <title>Formulaire modification ingrédient</title>
</head>

<body>
<form action="index.php?action=formModifieHashtag&module=mod_Recette" method="post">
    <div>
        <input type="text" name="newHashtag" class="info" placeholder="nouveau hashtag"><br><br>
        <input type="hidden" name="token" value=<?=$token?>>
        <input type="submit" value="valider" class="submit" name="confirmIngredient"><br><br>
    </div>
</form>