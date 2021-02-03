<?php

require_once "db.php";
require_once "Manager.class.php";
require_once "Account.class.php";

$AccountManager = new AccountManager($bdd);

//$AccountManager->addAccount('Robignole', 'robinpass', 'robinette@mail.com');
/* $AccountManager->updateAccount_email('05', 'bgdu95@mail.com');

$account = $AccountManager->getById('05'); */
//$account = $AccountManager->addAccount(10, 'ugo', '123', 'oui@oui');

 //var_dump($AccountManager->isAccountValid('rob', 'oui@oui'));
$account = $AccountManager->getByEmail('ah@ah');
$AccountManager->deleteAccount('ougo', 'ah@ah');

echo '<pre>';
//var_dump($account->password);
echo '</pre>';
?>