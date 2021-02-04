<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Accueil</title>
</head>
<body>
    <?php
        if (isset($_SESSION['account_created'])) {
    ?>        
            <div><?php echo $_SESSION['account_created'];?></div>
    <?php
        unset($_SESSION['account_created']);     
        }
    ?>
    <form action="../PHP/admin_panel.php" method="POST">
            <input type="email" name="email" placeholder="Email"><br />
            <input type="text" name="username" placeholder="Username"><br />
            <input type="password" name="password" placeholder="Password"><br />
            <button type="submit">Add account</button>
    </form>
    <br />
    <br />
    <?php
        if (isset($_SESSION['username_modified'])) {
    ?>        
            <div><?php echo $_SESSION['username_modified'];?></div>
    <?php
        unset($_SESSION['username_modified']);     
        }
    ?>
    <form action="../PHP/admin_panel.php" method="POST">
            <input type="email" name="mod_email" placeholder="Account Email"><br />
            <input type="text" name="mod_username" placeholder="New Username"><br />
            <button type="submit">Modify username from account</button>
    </form>    

    <br />
    <br />
    <?php
        if (isset($_SESSION['email_modified'])) {
    ?>        
            <div><?php echo $_SESSION['email_modified'];?></div>
    <?php
        unset($_SESSION['email_modified']);     
        }
    ?>
    <form action="../PHP/admin_panel.php" method="POST">
            <input type="test" name="mod_username2" placeholder="Account Username"><br />
            <input type="email" name="mod_email2" placeholder="New Email"><br />
            <button type="submit">Modify email from account</button>
    </form>    
</body>
</html>