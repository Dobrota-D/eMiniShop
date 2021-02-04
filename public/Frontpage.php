<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <form action = "..\PHP\Frontpageclass.php" method = "post">
        <input type="checkbox" value = "Sport" name = "Sport"> Sport 
        <input type="checkbox" value = "Toy" name = "Toy"> Jouet 
        <input type="checkbox" value = "Camera" name = "Camera"> Appareil photo
        <button type = submit> Appliquer les filtres </button>
    </form>
</body>
</html>
