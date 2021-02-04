<?php
require_once "Manager.class.php";

class ArticleManager extends Manager {
    function __construct($db) {
        parent::__construct($db);
    }

    //getBy article and category section

    function getById_Article($id_article) {
        $query = $this->db->prepare("SELECT * FROM article WHERE id_article = :id_article");
        $query->bindValue(':id_article', $id_article);
        $query->execute();
        $article_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $article->hydrate($article_from_sql);
        return $article;
    }

    function getByName_Article($name_article) {
        $query = $this->db->prepare("SELECT * FROM article WHERE name_article = :name_article");
        $query->bindValue(':name_article', $name_article);
        $query->execute();
        $article_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $article = new article();
        $article->hydrate($article_from_sql);
        return $article;
    }

    function getById_Category($id_category) {
        $query = $this->db->prepare("SELECT * FROM category WHERE id_category = :id_category");
        $query->bindValue(':id_category', $id_category);
        $query->execute();
        $category_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $category = new category();
        $category->hydrate($category_from_sql);
        return $category;
    }

    function getByName_Category($name_category) {
        $query = $this->db->prepare("SELECT * FROM category WHERE name_category = :name_category");
        $query->bindValue(':name_category', $name_category);
        $query->execute();
        $category_from_sql = $query->fetch(PDO::FETCH_ASSOC);
        $category = new category();
        $category->hydrate($category_from_sql);
        return $category;
    }

//article additions section
    function addArticle($name_article, $price_article, $quantity_article){
        $query = $this->db->prepare("INSERT INTO article (name_article, price_article, quantity_article, creation_date) VALUES (:name_article, :price_article, :quantity_article)");
        $query->bindValue(':name_article', $name_article);
        $query->bindValue(':price_article', $price_article);
        $query->bindValue(':quantity_article', $quantity_article);
        $query->execute();

    }

    function addPriceArticle($name_article, $price_article, $quantity_article){
        $query = $this->db->prepare("INSERT INTO article (name_article, price_article, quantity_article, creation_date) VALUES (:name_article, :price_article, :quantity_article)");
        $query->bindValue(':name_article', $name_article);
        $query->bindValue(':price_article', $price_article);
        $query->bindValue(':quantity_article', $quantity_article);
        $query->execute();

    }

    function addName_Category($name_category, $id_category){
        $query = $this->db->prepare("INSERT INTO category (name_category, id_category) VALUES (:name_category, :id_category)");
        $query->bindValue(':name_category', $name_category);
        $query->bindValue(':id_category', $id_category);
        $query->execute();

    }

//article feature section 
    function deletearticle($name_article, $quantity_article){
        $query = $this->db->prepare("DELETE FROM article WHERE quantity_article=:quantity_article AND name_article=:name_article");
        $query->bindValue(':name_article', $name_article);
        $query->bindValue(':quantity_article', $quantity_article);
        $query->execute();

    }

    function updatearticle($id_article, $changed_value){
        $query = $this->db->prepare("UPDATE article SET price_article=:changed_value WHERE id_article=:id_article");
        $query->bindValue(':id_article', $id_article);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function update_name_article($id_article, $changed_value){
        $query = $this->db->prepare("UPDATE article SET name_article=:changed_value WHERE id_article=:id_article");
        $query->bindValue(':id_article', $id_article);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

    function updatearticle_quantity_article($id_article, $changed_value){
        $query = $this->db->prepare("UPDATE article SET quantity_article=:changed_value WHERE id_article=:id_article");
        $query->bindValue(':id_article', $id_article);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }
    
    function isarticleValid($name_article, $quantity_article) {
        $query = $this->db->prepare("SELECT * FROM article WHERE name_article=:name_article OR quantity_article=:quantity_article");
        $query->bindValue(':name_article', $name_article);
        $query->bindValue(':quantity_article', $quantity_article);
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) > 0) {
            return true;
        } else {
            return false;
        }

    }


    //category
    function deleteName_Category($name_category){
        $query = $this->db->prepare("DELETE FROM category WHERE name_category=:name_category AND name_article=:name_article");
        $query->bindValue(':name_category', $name_category);
        $query->execute();

    }

    function updateName_Category($Name_Category, $changed_value){
        $query = $this->db->prepare("UPDATE category SET name_category=:changed_value WHERE name_category=:name_category");
        $query->bindValue(':name_category', $name_category);
        $query->bindValue(':changed_value', $changed_value);
        $query->execute();

    }

 

    

}




?>