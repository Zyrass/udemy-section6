<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Teste Session</h1>
    <hr>
    <p>Le nom stocker dans la super global session est : <?php echo $_SESSION["nom"]?></p>
    <hr>
    <a href="index.php">Index.php</a>
</body>
</html>