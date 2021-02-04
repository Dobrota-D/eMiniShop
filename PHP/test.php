<?php

require_once "init.php";

$AccountManager = new AccountManager($bdd);
$ArticleManager = new ArticleManager($bdd);

//$AccountManager->updateAccount_email('15', 'çamarchelol@mail.com');
//$account = $AccountManager->addAccount(10, 'ugo', '123', 'oui@oui');

 //var_dump($AccountManager->isAccountValid('rob', 'oui@oui'));
//$account = $AccountManager->getByEmail('ah@ah');
//$AccountManager->deleteAccount('ougo', 'ah@ah');
$ArticleManager->addArticle("couille", "Ceci est une couille bien velue lul", 2, 200.0);
$articles = $ArticleManager->getAll_Article();

echo '<pre>';
var_dump($articles);
echo '</pre>';
?>