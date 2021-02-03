<?php

try {
    $bdd = new PDO('mysql:host=2eurhost.com;dbname=eurh_groupe7;charset=utf8', "groupe7", "lrLi70$7");
    echo 'Success connection to db';
}
catch (Exception $e)
{
    die('Erreur de connection à la base de données : ' . $e);
}

?>