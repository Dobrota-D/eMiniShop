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
        $id = 11;
        $password = hash('sha256', $_POST['password']);
        $AccountManager->addAccount($id, $_POST['username'], $password, $_POST['email']);
    }

?>