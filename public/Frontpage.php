

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        .article-container {
            display: flex;
            justufy-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }
        p {
            margin: 3px 0;
        }
    </style>
</head>
<body>
    <form action = "./Frontpage.php" method = "post">
    <select name="select">
            <option value="sport">Sport</option>
            <option value="Toy">Toy</option>
            <option value="Camera">Camera</option>
        </select>
        <button type="submit">Appliquer les filtres</button>
    </form>
    <div class="article-container">
    <?php
        require_once "../PHP/init.php";

        if (empty($_POST)) {
            $articles = $ArticleManager-> getAll_Article();
            for ($i=0; $i < count($articles) ; $i++) {
                echo
                    '<div class="article-card" style="min-width: 200px; min-height: 40px; border: 1px solid grey; border-radius: 7px; margin: 10px; padding: 6px; display: inline-flex; flex-direction: column; justify-content: space-around; align-items: flex-start">
                        <p class="article-name" style="font-weight: 600">'.$articles[$i]['name_article'].'
                        <p class="article-description" style="opacity: .8">'.$articles[$i]['description_article'].'</p>
                        <p class="article-price" style="font-size: 17px">'.$articles[$i]['price_article'].'€</p>
                        <button>Ajouter au panier</button>
                    </div>';
    
                    echo '<br>';
            }
        }
        else {
            $articles = $ArticleManager-> getArticleByCategoryName($_POST['select']);
    
            for ($i=0; $i < count($articles) ; $i++) {
                echo
                    '<div class="article-card" style="min-width: 200px; min-height: 40px; border: 1px solid grey; border-radius: 7px; margin: 10px; padding: 6px; display: inline-flex; flex-direction: column; justify-content: space-around; align-items: flex-start">
                        <p class="article-name" style="font-weight: 600">'.$articles[$i]['name_article'].'
                        <p class="article-description" style="opacity: .8">'.$articles[$i]['description_article'].'</p>
                        <p class="article-price" style="font-size: 17px">'.$articles[$i]['price_article'].'€</p>
                        <button>Ajouter au panier</button>
                    </div>';
    
                    echo '<br>';
            }
        }

    ?>
    </div>
</body>
</html>
