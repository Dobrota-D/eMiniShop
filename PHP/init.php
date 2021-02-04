<?php

session_start();
require_once "db.php";
require_once "Manager/Manager.class.php";
require_once "Account.class.php";

$AccountManager = new AccountManager($bdd);