<?php
include "init.php";
session_start();

$queryPlayer1 = "SELECT * FROM personnages WHERE player_number = 1 ORDER BY id DESC LIMIT 1";
$resultPlayer1 = $db->query($queryPlayer1);
$player1Character = $resultPlayer1->fetch(PDO::FETCH_ASSOC);

$queryPlayer2 = "SELECT * FROM personnages WHERE player_number = 2 ORDER BY id DESC LIMIT 1";
$resultPlayer2 = $db->query($queryPlayer2);
$player2Character = $resultPlayer2->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fight !!!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png"/>

</head>
<body id="bodyfight">

<section id="fight">
    <div id="player1Characters">
        <?php if ($player1Character) : ?>
            <img src="img/<?php echo $player1Character['img']; ?>" alt="">
        <?php endif; ?>

    <form class="attack" action="attack.php?p=1" method="post">

<input type="submit" name="attack" value="<?php echo $player1Character['nom']; ?> attack">
</form>
    </div>

    <div id="player2Characters">
        <?php if ($player2Character) : ?>
            <img src="img/<?php echo $player2Character['img']; ?>" alt="">
        <?php endif; ?>
        <form class="attack" action="attack.php?p=2" method="post">

<input type="submit" name="attack" value="<?php echo $player2Character['nom']; ?> attack">
</form>
    </div>
</section>

    <div id="combatVis">
        <div id="P1combat">
        <?php if ($player1Character) : ?>
            <div id="flexStats">
                <img src="img/<?php echo $player1Character['img']; ?>" alt="" class="imgResume">
                        <p><?php echo $player1Character['pv']; ?> PV</p>
            </div>
                <div id="stats">
                    <p><?php echo $player1Character['nom']; ?></p>
                    <div id="center"><img src="img/GoldenHammerIconSSBB.png" alt=""> <?php echo $player1Character['atk']; ?></div>
                </div>
        <?php endif; ?>
        </div>

        <form action="endGame.php" method="post" class="endgame">
            <input type="submit" name="endgame" value="End the game" class="endgamemoment">
        </form>

        <div id="P2combat">
        <?php if ($player2Character) : ?>
            <div id="flexStats">
            <img src="img/<?php echo $player2Character['img']; ?>" alt="" class="imgResume">
                    <p><?php echo $player2Character['pv']; ?> PV</p>
        </div>
        <div id="stats">
                <p><?php echo $player2Character['nom']; ?></p>
                <div id="center"><img src="img/GoldenHammerIconSSBB.png" alt=""> <?php echo $player2Character['atk']; ?></div>
        </div>
        <?php endif; ?>
        </div>
    </div>


</body>
</html>


