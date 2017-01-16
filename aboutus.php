<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>About US</h1>
    <h2><?php
        echo "Mes formations préférer sont : " . $_GET["lang1"] . " " . $_GET["lang2"] . " " . $_GET["lang3"] . " " . $_GET["lang4"] . " " . $_GET["lang5"];
    ?></h2>
    <hr>
    <a href="index.php">Retour sur la page d'accueil</a>
</body>
</html>