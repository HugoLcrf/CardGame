<?php
include "init.php";

session_start(); // Démarrer la session

$query = "SELECT * FROM personnages";
$result = $db->query($query);
$personnages = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SelectScreen</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png"/>
    <script src="script.js"></script>
</head>
<body>

<div id="SelectScreen">
<?php
if ($personnages) {
    foreach ($personnages as $personnage) {
        $imgSrc = $personnage['img'];

        // Vérifier si 'img' est une URL valide
        if (filter_var($imgSrc, FILTER_VALIDATE_URL)) {
            // Si c'est une URL, afficher en tant qu'image
            echo "<button class='BoxCharacter' data-id='{$personnage['id']}' data-nom='{$personnage['nom']} ' data-player-number='{$personnage['player_number']}'>
                    <div class='BoxTXT'>{$personnage['nom']}</div>
                    <div class='BoxImg'><img src='{$imgSrc}' alt=''></div>
                  </button>";
        } else {
            // Si ce n'est pas une URL, traiter comme chemin local
            echo "<button class='BoxCharacter' data-id='{$personnage['id']}' data-nom='{$personnage['nom']}' data-player-number='{$personnage['player_number']}'>
                    <div class='BoxTXT'>{$personnage['nom']}</div>
                    <div class='BoxImg'><img src='img/{$imgSrc}' alt=''></div>
                  </button>";
        }
    }
}
?>





    <a class="BoxCharacter" href="AddPersonnage.php">
        <div class="BoxTXT"> Create new Personnage </div>
        <div class="BoxImg"><img src="img/Art_Boxeur_Mii_Ultimate.png" alt=""></div>
    </a>
</div>



<a id="ReadyButt" href="fight.php?update=1">
    <img src="img/foundation_arrow-up.png" alt="">
    <p>READY TO FIGHT</p>
</a>


<div id="SelectedChamp">
<td>
    <a class="buttStats" href="stats_personnage.php">Voir les <br> statistique</a>
</td>
    <div id="P1">
        <img src="img/None.png" alt="">
        <p></p>
    </div>
    <div id="P2">
        <img src="img/None.png" alt="">
        <p></p>
    </div>
    <div id="P3">
        <img src="img/None.png" alt="">
    </div>
    <div id="P4">
        <img src="img/None.png" alt="">
    </div>
</div>
    
</body>
</html>

