<?php

require_once "Account.class.php";

class Manager {
    protected $db;
    function __construct($db) {
        $this->setDb($db);
    }

    function setDb($db) {
        $this->db = $db;
    }
}    



class AccountManager extends Manager {
    function __construct($db) {
        parent::__construct($db);
    }

    function getById($id_user) {
        $query = $this->db->prepare("SELECT * FROM account WHERE id_user = :id_user");
        $query->bindValue(':id_user', $id_user);
        $query->execute();
        
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getByUsername($username) {
        $query = $this->db->prepare("SELECT * FROM account WHERE username = :username");
        $query->bindValue(':username', $username);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function addAccount($username, $password, $email){
        $creation_date = date('Y/m/d H:i:s');
        $query = $this->db->prepare("INSERT INTO account (username, password, email, creation_date, is_admin) VALUES (:username, :password, :email, :creation_date, 0)");
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':email', $email);
        $query->bindValue(':creation_date', $creation_date);

        $query->execute();

    }

    function updateAccount_password($id_user, $changed_value){
        $query = $this->db->prepare("UPDATE account SET password=:changed_value WHERE id_user=:id_user");
        $query->bindValue(':id_user', $id_user);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updateAccount_username($id_user, $changed_value){
        $query = $this->db->prepare("UPDATE account SET username=:changed_value WHERE id_user=:id_user");
        $query->bindValue(':id_user', $id_user);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updateAccount_email($id_user, $changed_value){
        $query = $this->db->prepare("UPDATE account SET email=:changed_value WHERE id_user=:id_user");
        $query->bindValue(':id_user', $id_user);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }
    
    function isAccountValid($username, $email) {
        $query = $this->db->prepare("SELECT * FROM account WHERE username=:username OR email=:email");
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) > 0) {
            return true;
        } else {
            return false;
        }

    }



    
    

    

}


?>