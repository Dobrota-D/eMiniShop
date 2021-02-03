<?php 
    require_once '../PHP/db.php';
    require_once '../PHP/init.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action="../PHP/signup.class.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>