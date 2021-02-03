<?php

require_once __DIR__ . "\\..\\Account.class.php";
require_once "ArticleManager.class.php";
require_once "AccountManager.class.php";

class Manager {
    protected $db;
    function __construct($db) {
        $this->setDb($db);
    }

    function setDb($db) {
        $this->db = $db;
    }
}    

?>