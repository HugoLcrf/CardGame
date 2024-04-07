<?php
include("init.php");

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistique Personnage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png"/>
</head>
<body>

<a href="index.php"><img src="img/foundation_arrow-up.png" alt="Retour a l'accueil"></a>

<?php

$query = "SELECT id, nom, atk, pv FROM personnages";
$result = $db->query($query);

if ($result->rowCount() > 0) {
    $personnages = $result->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class="tableau">';
    echo '<tr><th>Name</th><th>Attack</th><th>PV</th><th>Actions</th></tr>';

    foreach ($personnages as $personnage) {
        echo '<tr>';
        echo '<td>' . $personnage['nom'] . '</td>';
        echo '<td>' . $personnage['atk'] . '</td>';
        echo '<td>' . $personnage['pv'] . '</td>';
        echo '<td>
            <a class="modify" href="modify_personnage.php?id=' . $personnage['id'] . '">Modifier</a>
            <a class="delete"  href="delete_personnage.php?id=' . $personnage['id'] . '" >Supprimer</a>
          </td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>

    
</body>
</html>
