<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Traitement du formulaire</h1>
    <hr>
    <a href="index.php">Retour à l'index.php</a>

    <p>Mon nom c'est : <?php echo $_POST["nom"]; ?></p>
    <p>Mon prénom c'est : <?php echo $_POST["prenom"]; ?></p>
    <p>Mon adresse email : <?php echo $_POST["mail"]; ?></p>
    
    
</body>
</html>