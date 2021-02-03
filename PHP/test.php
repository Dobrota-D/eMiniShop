<?php

require_once "db.php";
require_once "Manager.class.php";
require_once "Account.class.php";

$AccountManager = new AccountManager($bdd);

//$AccountManager->addAccount('05', 'Robignole', 'robinpass', 'robinette@mail.com');
$AccountManager->updateAccount_email('05', 'bgdu95@mail.com');

$account = $AccountManager->getById('05');

echo '<pre>';
var_dump($account);
echo '</pre>';
?>