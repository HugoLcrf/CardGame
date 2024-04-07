<?php
include "init.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $playername = $_POST["playername"];
    $img = $_POST["img"];
    $atk = $_POST["atk"];
    $pv = $_POST["pv"];

    $query = "INSERT INTO `personnages` (`player_number`, `nom`, `img`, `atk`, `pv`) VALUES (0, :playername, :img, :atk, :pv)";

    $stmt = $db->prepare($query);

    // Liaison des valeurs aux paramètres
    $stmt->bindParam(':playername', $playername);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':atk', $atk);
    $stmt->bindParam(':pv', $pv);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    }
}
?>