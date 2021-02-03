<?php

require_once "init.php";

$AccountManager = new AccountManager($bdd);

$AccountManager->updateAccount_email('15', 'çamarchelol@mail.com');
//$account = $AccountManager->addAccount(10, 'ugo', '123', 'oui@oui');

 //var_dump($AccountManager->isAccountValid('rob', 'oui@oui'));
//$account = $AccountManager->getByEmail('ah@ah');
//$AccountManager->deleteAccount('ougo', 'ah@ah');

echo '<pre>';
//var_dump($account->password);
echo '</pre>';
?>