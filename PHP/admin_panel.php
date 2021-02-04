<?php

require_once "init.php";

function handleError($message) {
    $_SESSION['error_message'] = $message;
    var_dump($message);
    die();
}

function add_account_form_is_empty($data){
    if (empty($data['username'])) {
        return true;
    }
    else if (empty($data['password'])) {
        return true;
    }
    else if (empty($data['email'])) {
        return true;
    }
    else{
        return false;
    }
}


function mod_account_form_is_empty($data){
    if (empty($data['mod_username'])) {
        return true;
    }
   
    else if (empty($data['mod_email'])) {
        return true;
    }
    else{
        return false;
    }
}


function redirect_to_panel(){

}

function isAdminLoggedIn($SESSION){
    if($SESSION["loggedin"] && $SESSION["is_admin"] == 1){
        return true;
    }
    else{
        return false;
    }
}

if (!isAdminLoggedIn($_SESSION)){
    handleError("You are not an admin or you're not logged in, please login as an administrator");
    header('Location: ../public/login.php');
    
}



if (!empty($_POST['username']) && !empty($_POST['email']) && !empty( $_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($AccountManager->isAccountValid($username, $email))
    $AccountManager->addAccount($username, $password, $email);
    $_SESSION['account_created'] = "Your account have been created";
    header('Location: ../public/admin.php');
    
}


if (!empty($_POST['delete_username']) && !empty($_POST['delete_email'])){
    $username = $_POST['delete_username'];
    $email = $_POST['delete_email'];
    $AccountManager->deleteAccount($username, $email);
    $_SESSION['account_deleted'] = "The account Username: $username bound to mail: $email has been deleted";
    header('Location: ../public/admin.php');
    
}

if (!empty($_POST['mod_username']) && !empty($_POST['mod_email'])){
    $AccountManager->updateAccount_username_from_email($_POST['mod_email'], $_POST['mod_username']);
    $_SESSION['username_modified'] = "Your account have been modified";
    header('Location: ../public/admin.php');
}

if (!empty($_POST['mod_username2']) && !empty($_POST['mod_email2'])){
    $AccountManager->updateAccount_email_from_username($_POST['mod_username2'], $_POST['mod_email2']);
    $_SESSION['email_modified'] = "Your account have been modified";
    header('Location: ../public/admin.php');
}

header('Location: ../public/admin.php')












?>