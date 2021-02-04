<?php

require_once "Manager.class.php";

class AccountManager extends Manager {
    function __construct($db) {
        parent::__construct($db);
    }

    function getById($id_user) {
        $query = $this->db->prepare("SELECT * FROM account WHERE id_user = :id_user");
        $query->bindValue(':id_user', $id_user);
        $query->execute();
        $account_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $account->hydrate($account_from_sql);
        return $account;
    }

    function getByUsername($username) {
        $query = $this->db->prepare("SELECT * FROM account WHERE username = :username");
        $query->bindValue(':username', $username);
        $query->execute();
        $account_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $account = new Account();
        $account->hydrate($account_from_sql);
        return $account;
    }

    function getByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM account WHERE email = :email");
        $query->bindValue(':email', $email);
        $query->execute();
        $account_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $account = new Account();
        $account->hydrate($account_from_sql);
        return $account;
    }

    function addAccount($username, $password, $email){
        $creation_date = date('Y/m/d H:i:s');
        $password = password_hash($password, $PASSWORD_DEFAULT);
        $query = $this->db->prepare("INSERT INTO account (username, password, email, creation_date, is_admin) VALUES (:username, :password, :email, :creation_date, 0)");
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':email', $email);
        $query->bindValue(':creation_date', $creation_date);
        $query->execute();

    }


    function addAdminAccount($username, $password, $email){
        $creation_date = date('Y/m/d H:i:s');
        $query = $this->db->prepare("INSERT INTO account (username, password, email, creation_date, is_admin) VALUES (:username, :password, :email, :creation_date, 1)");
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':email', $email);
        $query->bindValue(':creation_date', $creation_date);
        $query->execute();

    }


    function deleteAccount($username, $email){
        $query = $this->db->prepare("DELETE FROM account WHERE email=:email AND username=:username");
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->execute();

    }


    function updateAccount_password_from_username($username, $changed_value){
        $query = $this->db->prepare("UPDATE account SET password=:changed_value WHERE username=:username");
        $query->bindValue(':username', $username);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updateAccount_username_from_email($email, $changed_value){
        $query = $this->db->prepare("UPDATE account SET username=:changed_value WHERE email=:email");
        $query->bindValue(':email', $email);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updateAccount_email_from_username($username, $changed_value){
        $query = $this->db->prepare("UPDATE account SET email=:changed_value WHERE username=:username");
        $query->bindValue(':username', $username);
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