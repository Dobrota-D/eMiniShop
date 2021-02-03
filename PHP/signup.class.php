<?php
    require_once "init.php";
    

    function handleError($message) {
        $_SESSION['error_message'] = $message;
        header('Location: ../public/signupForm.php');
        die();
    }

    if (empty($_POST['username'])) {
        handleError("Merci de rensigner un nom d'utilisateur");
    }
    else if (empty($_POST['password'])) {
        handleError("Merci de renseigner un mot de passe");
    }
    else if (empty($_POST['email'])) {
        handleError("Merci de renseigner un email");
    }
    if ($AccountManager->isAccountValid($_POST['username'], $_POST['email'])) {
        handleError("Nom d'utilisateur ou email déjà utilisé");
    }
    else {
        // Create the new account
        $password = hash('sha256', $_POST['password']);
        $AccountManager->addAccount($_POST['username'], $password, $_POST['email']);

        // Start session and redirect the user

        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $_POST['username'];

        header('Location: ../public/Index.php');
    }

?>