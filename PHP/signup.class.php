<?php
    require_once "db.php";
    require_once "init.php";
    require_once "manager.php";

    function handleError($message) {
        $_SESSION['error_message'] = $message;
        header('Location: ../public/signupForm.php');
        die();
    }

    $alreadyUser = getByUsername($_POST['username'], $bdd);
    $alreadyEmail = getByEmail($_POST['email'], $bdd);

    if (empty($_POST['username'])) {
        handleError("Merci de rensigner un nom d'utilisateur");
    }
    else if (empty($_POST['password'])) {
        handleError("Merci de renseigner un mot de passe");
    }
    else if (empty($_POST['email'])) {
        handleError("Merci de renseigner un email");
    }
    else if (count($alreadyUser) > 0) {
        handleError("'" . $_POST['username'] . "' est déjà utilisé");
    }
    else if (count($alreadyEmail) > 0) {
        handleError("'" . $_POST['email'] . "' est déjà utilisé");
    }
    else {
        header('Location: ../public/index.php');
        die();
    }

?>