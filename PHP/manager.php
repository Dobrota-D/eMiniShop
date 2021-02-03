<?php

    require_once 'db.php';

    function getByUsername($username, $bdd) {
        
        $req = $bdd->prepare("SELECT * FROM account WHERE username = :username");
        $req->bindValue(':username', $username);
        $req->execute();
        
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function getByEmail($email) {
        $req = $bdd->prepare("SELECT * FROM account WHERE email = :email");
        $req->bindValue(':email', $email);
        $req->execute();
        
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    var_dump(getByUsername('rob', $bdd))

?>