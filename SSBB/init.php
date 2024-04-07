<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function chargerClasse($Personnage)
{
  require $Personnage . '.php';
}

spl_autoload_register('chargerClasse');

$db = new PDO('mysql:host=localhost;dbname=SSBB;port=8889;charset=utf8', 'root', 'root');
$monManager = new PersonnageManager($db);
?>
