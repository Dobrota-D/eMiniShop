<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <header>
    <?php

        var_dump($_SESSION);
    ?>    
        <button>Déconnexion</button>
        <button>Supprimer mon compte</button>
    </header>
    <p>JESUIS ADMIN</p>
</body>
</html>