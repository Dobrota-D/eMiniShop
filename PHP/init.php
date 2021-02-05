<?php

session_start();
require_once "db.php";
require_once "Manager/Manager.class.php";
require_once "Manager/ArticleManager.class.php";
require_once "Objects/Account.class.php";

$AccountManager = new AccountManager($bdd);
$ArticleManager = new ArticleManager($bdd);
$panier = [];