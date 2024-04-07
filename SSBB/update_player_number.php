<?php
include "init.php";

if (isset($_POST['champId']) && isset($_POST['playerNumber'])) {
    $champId = $_POST['champId'];
    $playerNumber = $_POST['playerNumber'];

    // Mettre à jour le player_number dans la base de données pour le personnage désélectionné
    $stmt = $db->prepare("UPDATE personnages SET player_number = :playerNumber WHERE id = :champId");
    $stmt->bindParam(':playerNumber', $playerNumber);
    $stmt->bindParam(':champId', $champId);
    $stmt->execute();
}
?>



