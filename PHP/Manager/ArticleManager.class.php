<?php
require_once "Manager.class.php";


class ArticleManager extends Manager {
    function __construct($db) {
        parent::__construct($db);
    }

    function getById($id_article) {
        $query = $this->db->prepare("SELECT * FROM article WHERE id_article = :id_article");
        $query->bindValue(':id_article', $id_article);
        $query->execute();
        $article_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $article->hydrate($article_from_sql);
        return $article;
    }

    function getByUsername($username) {
        $query = $this->db->prepare("SELECT * FROM article WHERE username = :username");
        $query->bindValue(':username', $username);
        $query->execute();
        $article_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $article = new article();
        $article->hydrate($article_from_sql);
        return $article;
    }

    function getByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM article WHERE email = :email");
        $query->bindValue(':email', $email);
        $query->execute();
        $article_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $article = new article();
        $article->hydrate($article_from_sql);
        return $article;
    }

    function addarticle($username, $password, $email){
        $creation_date = date('Y/m/d H:i:s');
        $query = $this->db->prepare("INSERT INTO article (username, password, email, creation_date, is_admin) VALUES (:username, :password, :email, :creation_date, 0)");
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':email', $email);
        $query->bindValue(':creation_date', $creation_date);
        $query->execute();

    }


    function addAdminarticle($username, $password, $email){
        $creation_date = date('Y/m/d H:i:s');
        $query = $this->db->prepare("INSERT INTO article (username, password, email, creation_date, is_admin) VALUES (:username, :password, :email, :creation_date, 1)");
        $query->bindValue(':username', $username);
        $query->bindValue(':password', $password);
        $query->bindValue(':email', $email);
        $query->bindValue(':creation_date', $creation_date);
        $query->execute();

    }


    function deletearticle($username, $email){
        $query = $this->db->prepare("DELETE FROM article WHERE email=:email AND username=:username");
        $query->bindValue(':username', $username);
        $query->bindValue(':email', $email);
        $query->execute();

    }


    function updatearticle_password($id_article, $changed_value){
        $query = $this->db->prepare("UPDATE article SET password=:changed_value WHERE id_article=:id_article");
        $query->bindValue(':id_article', $id_article);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updatearticle_username($id_article, $changed_value){
        $query = $this->db->prepare("UPDATE article SET username=:changed_value WHERE id_article=:id_article");
        $query->bindValue(':id_article', $id_article);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updatearticle_email($id_article, $changed_value){
        $query = $this->db->prepare("UPDATE article SET email=:changed_value WHERE id_article=:id_article");
        $query->bindValue(':id_article', $id_article);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }
    
    function isarticleValid($username, $email) {
        $query = $this->db->prepare("SELECT * FROM article WHERE username=:username OR email=:email");
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