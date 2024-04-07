<?php

include("init.php");
session_start();


// Pour definir lorsque je clique sur le button p=1 cela fait attaque le personnages 1
$p1 = 1;
$p2 = 2;

// Pour definir lorsque je clique sur le button p=2 cela fait attaque le personnages 2

if($_GET['p'] == 2){
    $p1 = 2;
    $p2 = 1;
}

$queryPlayer1 = "SELECT * FROM personnages WHERE player_number = $p1 ORDER BY id DESC LIMIT 1";
$resultPlayer1 = $db->query($queryPlayer1);
$player1Character = $resultPlayer1->fetch(PDO::FETCH_ASSOC);

$queryPlayer2 = "SELECT * FROM personnages WHERE player_number = $p2 ORDER BY id DESC LIMIT 1";
$resultPlayer2 = $db->query($queryPlayer2);
$player2Character = $resultPlayer2->fetch(PDO::FETCH_ASSOC);


// Récupération des identifiants des personnages sélectionnés pour les joueurs 1 et 2
$perso1Id = $player1Character['id'];
$perso2Id = $player2Character['id'];


// Recherche des personnages correspondants dans la base de données
$perso1 = $monManager->getOnePersonnageById($perso1Id);
$perso2 = $monManager->getOnePersonnageById($perso2Id);

// Vérification que les personnages ont été trouvés
if ($perso1 && $perso2) {
    // Les personnages s'attaquent
    $perso1->attack($perso2);
    $monManager->die($perso2);
    $monManager->update($perso1);
    $monManager->update($perso2);
}


header('Location: fight.php?error=new_atk');

?>
