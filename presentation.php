<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php
            echo "Hello moi c'est" . $_GET["nom"] . " et j'ai " . $_GET["age"] . "ans !";
        ?>
    </h1>
</body>
</html>