<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer un personnage</title>
</head>
<body>
    
    <form action="./index.php" method="POST">
    Nouveau joueur<br>
        <input type="text" name="nom" ><br>
        Vie<br>
        <input type="text" name="degats" value="100">
        <input type="submit" value="Jouer">
        
    </form>

</body>
</html>
<?php


require('./class/Personnage.php');
require('./class/PersonnagesManager.php');
// require('./controler/service_create.php');
$name="";
$health="";
if( isset( $_POST["nom"] ) ){
    $name = $_POST["nom"];
    $health = $_POST["degats"];   
}

$perso = new Personnage([
  'nom' => $name,
  'forcePerso' => 5,
  'degats' => $health,
  'niveau' => 1,
  'experience' => 4
]);

$db = new PDO('mysql:host=localhost;dbname=mdd', 'root', 'root');
$manager = new PersonnagesManager($db);
    
$manager->add($perso);