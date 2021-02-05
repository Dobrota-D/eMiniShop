<?php

    require_once "init.php";

    if (isset($_POST['article'])) {
        $article = $ArticleManager->getByName_Article($_POST['article']);
        $valeur_article =[$article->name_article, $article->price_article];
        array_push($panier, $valeur_article);
        var_dump($panier);

        echo
        '<div class="article-cart-card" style="margin: 5px 0;padding: 7px;">
            <p style="display:inline; margin-right:5px">'.$article->name_article.'</p>
            <p style="display:inline">'.$article->price_article.'€</p>
        </div>';
        header('Location: ../public/home.php');
        
    }

    function emptyCart(){
        $_SESSION['panier'] = [];
    }
    
    if (isset($_POST['empty_cart'])){
        emptyCart();
        header('Location: ../public/home.php');

    }

    var_dump($_POST)

?>    