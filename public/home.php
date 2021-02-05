
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Frontpage.css">
    <title>Accueil</title>
</head>
<body style="display: flex;justify-content: center;margin: 0;font-family:sans-serif">

    <header>
        <p style="margin-left:15px">Bonjour, <?php echo $_SESSION['username'] ?></p>
        <div>
            <a href="login.php" class="login-btn">Connexion</a>
            <a href="signupForm.php" class="signup-btn">S'inscrire</a>
        </div>
    </header>    

    <div class="main">
        <form action = "./home.php" method = "POST">
            <select name="select" class="select-form">
                <option value="" selected disabled hidden>Catégorie</option>
                <option value="sport">Sport</option>
                <option value="Toy">Toy</option>
                <option value="Camera">Camera</option>
            </select>
            <button type="submit">Appliquer les filtres</button>
        </form>
        <div class="article-container">
        <?php
            require_once "../PHP/init.php";
            if (empty($_POST['select'])) {
                $articles = $ArticleManager-> getAll_Article();
                for ($i=0; $i < count($articles) ; $i++) {
                    echo
                    '<form method="POST" class="form-card">
                        <div class="img-container">
                            <img src="./assets/'.$articles[$i]['image'].'" class="card-img-top" alt="'.$articles[$i]['image'].'">
                        </div>
                        <div class="article-card">
                            <p class="article-name" style="font-weight: 600;">'.$articles[$i]['name_article'].'</p>
                            <p class="article-description" style="opacity: .8;font-size:13px">'.$articles[$i]['description_article'].'</p>
                            <p class="article-price" style="font-size: 17px;">'.$articles[$i]['price_article'].'€</p>
                            <input type="hidden" name="article" value="'.$articles[$i]['name_article'].'">
                            <button name="'.$articles[$i]['name_article'].'">Ajouter au panier</button>
                        </div>
                    </form>';
                }
            }
            else {
                $articles = $ArticleManager-> getArticleByCategoryName($_POST['select']);
        
                for ($i=0; $i < count($articles) ; $i++) {
                    echo
                    '<form method="POST" class="form-card">
                        <div class="img-container">
                            <img src="./assets/'.$articles[$i]['image'].'" class="card-img-top" alt="'.$articles[$i]['image'].'">
                        </div>
                        <div class="article-card">
                            <p class="article-name" style="font-weight: 600;">'.$articles[$i]['name_article'].'</p>
                            <p class="article-description" style="opacity: .8;font-size:13px">'.$articles[$i]['description_article'].'</p>
                            <p class="article-price" style="font-size: 17px;">'.$articles[$i]['price_article'].'€</p>
                            <input type="hidden" name="article" value="'.$articles[$i]['name_article'].'">
                            <button name="'.$articles[$i]['name_article'].'">Ajouter au panier</button>
                        </div>
                    </form>';
                }
            }
        ?>
        </div>
    </div>

    <div class="cart-container" style="display:flex;width:19%;border-left: 1px solid black;">
        <div class="article-list" style="width: 100%;">
            <?php 
                
                if (!isset($_SESSION['panier'])){
                    $_SESSION['panier'] = [];
                }
                if (isset($_POST['article'])) {
                    $article = $ArticleManager->getByName_Article($_POST['article']);
                    $valeur_article =[$article->name_article, $article->price_article];
                    array_push($_SESSION['panier'], $valeur_article);
                    ?>
                    <div class="article-cart-card" style="margin: 5px 0;padding: 7px;">
                        
                        <?php for ($i=0; $i < count($_SESSION['panier']) ; $i++) { 
                            ?>
                            <p style="display:inline; margin-right:5px"><?php echo $_SESSION['panier'][$i][0] ?></p>
                            <p style="display:inline"><?php echo $_SESSION['panier'][$i][1] . '€' ?></p><br />
                            <?php
                        }
                        ?>
                    </div>
                <?php    
                }

            ?>
        </div>
        <div class="cart-infos" style="position:absolute; bottom:10;right:10px">


        <form action="../PHP/panier.php" method="POST">
            <input type="hidden" value="vide le panier" name="empty_cart">    
            <button type="submit" style="height: 30px">Vider le panier</button>
        </form>

        </div>
        <div class="cart-infos" style="position:absolute; bottom:10px;right:10px">
        <form action="./Invoice.php" method="POST">
            <?php echo "Total panier : " . $ArticleManager->totalCart() . " €" ?> 
            <button type="submit" style="height: 30px">Valider mon panier</button>
        </from>    
        </div>

        
    </div>
</body>
</html>