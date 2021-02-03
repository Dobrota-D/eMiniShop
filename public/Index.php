<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
<?php var_dump($_SESSION) ?>
    <header>
        <p>Connecté en tant que <?php print($_SESSION["username"]) ?></p>
        <button>Déconnexion</button>
        <button>Supprimer mon compte</button>
    </header>
    <p>Yo</p>
</body>
</html>