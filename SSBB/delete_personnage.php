<?php
include("init.php");
// Verifier si l'ID existe
if (isset($_GET['id'])) {
    $personnage = $monManager->getOnePersonnageById($_GET['id']);
    $monManager->delete($personnage);
    header('Location: index.php?error=delete');
    exit;
}
