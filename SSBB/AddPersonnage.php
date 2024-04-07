<?php
include "init.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Personnage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png"/>

</head>
<body>

<a href="index.php"><img src="img/foundation_arrow-up.png" alt="Retour aux statistiques"></a>

<section id="FormPerso">
    <h1>Ajouter un Personnage</h1>
    
    <form action="addperso.php" method="post">
        <div>
            <label for="playername">Nom du Personnage:</label>
            <input type="text" id="playername" name="playername" required>
        </div>
    
        <div>
            <label for="img">URL de l'image:</label>
            <input type="text" id="img" name="img" >
        </div>
        <div>
            <label for="atk">ATK:</label>
            <input type="number" id="atk" name="atk" required>
        </div>
    
        <div>
            <label for="pv">PV:</label>
            <input type="number" id="pv" name="pv" required>
        </div>
    
        <button type="submit">Ajouter le Personnage</button>
    </form>
</section>

</body>
</html>


