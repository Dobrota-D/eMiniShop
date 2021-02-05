<?php

require_once "../init.php";
var_dump($_POST);

function handleError($message) {
    $_SESSION['error_message'] = $message;
    var_dump($message);
    die();
}


function isAdminLoggedIn($SESSION){
    if($SESSION["loggedin"] && $SESSION["is_admin"] == 1){
        return true;
    }
    else{
        return false;
    }
}
function removeArticle($article_name){
    $ArticleManager->deleteArticle($article_name);
    header('Location: ../../public/admin.php');

}

if (!empty($_POST['name_article']) && !empty($_POST['description_article']) && !empty($_POST['quantity_article']) && !empty($_POST['price_article']) && !empty($_POST['category_article'])){
    $ArticleManager->addArticle($_POST['name_article'], $_POST['description_article'], $_POST['quantity_article'], $_POST['price_article'], $_POST['category_article']);
    $name_article = $_POST['name_article'];
    $_SESSION['article_added'] = "The article $name_article has been added to the store";
    header('Location: ../../public/admin.php');
}


if (!empty($_POST['rm_name_article'])){
    $ArticleManager->deleteArticle($_POST['rm_name_article']);
    $_SESSION['article_removed'] = "The article $name_article has been deleted from the store";
    header('Location: ../../public/admin.php');
}

if (!empty($_POST['remove_article'])){
    removeArticle($_POST['remove_article']);
}

//header('Location: ../../public/admin.php');

?>
