<?php

include("init.php");

$id = $_GET['id'];
$player = $monManager->getOnePersonnageById($id);

if (!empty($_POST)) {
    $player->setNom($_POST['nom']);
    $player->setAtk($_POST['atk']);
    $player->setPv($_POST['pv']);
    $monManager->update($player);
    header("Location:index.php?error=modif");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier perso</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png"/>

</head>

<body >

<a href="stats_personnage.php"><img src="img/foundation_arrow-up.png" alt="Retour aux statistiques"></a>

    <div id="FormPerso">
        <h1>Modifier perso</h1>
        <form method="post">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="nom" name="nom" value="<?= $player->getNom() ?>"><br><br>
            </div>
            <div>
                <label for="atk">Attack:</label>
                <input type="number" id="atk" name="atk" value="<?= $player->getAtk() ?>"><br><br>
            </div>
            <div>
                <label for="pv">Pv:</label>
                <input type="number" id="pv" name="pv" value="<?= $player->getPv() ?>"><br><br>
            </div>
            <input type="submit" value="Modifier">
        </form>
    </div>
    
</body>

</html>