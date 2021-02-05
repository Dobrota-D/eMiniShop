<?php 
    require_once '../PHP/init.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
    <?php 
        require_once '../PHP/views/style.php';
        setSignUpStyle();
    ?>
    <title>Inscription</title>
</head>
<body>
    <?php
        if (isset($_SESSION['error_message'])) {
    ?>
        <div><?php echo $_SESSION['error_message']; ?></div>
    <?php
        unset($_SESSION['error_message']);
    }
    ?>
    

    <div class="wrapper">
        <h2>Inscription</h2>
        <p>Veuillez remplir vos identifiants pour vous inscrire.</p>
        <form action = '../PHP/signup.class.php' method="POST">
            <div class="form-group ">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" placeholder="Username">
                <span class="help-block"></span>
            </div>
            <div class="form-group ">
                <label>E:mail</label>
                <input type="email" name="email" placeholder="Email">
                <span class="help-block"></span>
            </div>       
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="Password">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">S'inscrire</button>
            </div>
            <p>Vous avez déjà un compte ? <a href="./login.php">Connexion</a>.</p>
        </form>
    </div>
</body>
</html>