<?php
include("init.php");

if (isset($_POST['endgame'])) {
    
    //supprimer tous les joueurs
    $monManager->removePlayers();

};

header('Location: index.php');
?>
