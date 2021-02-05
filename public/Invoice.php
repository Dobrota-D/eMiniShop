<?php
require_once "../PHP/init.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résumé</title>
    <style>
        body {
            font-family: sans-serif;
            margin-left: 30px;
        }
        h1 {
            font-size: 20px;
            margin: 50px 0px;
        }
        .article {
            margin: 10px 0;
        }
        .article span {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Résumé de votre panier</h1>
    <?php
    for ($i=0; $i < count($_SESSION['panier']) ; $i++) {
        echo '<p class="article"> - '.$_SESSION['panier'][$i][0].'<span>'.$_SESSION['panier'][$i][1].'€</span></p>';
    }
    ?>
        <form action="../PHP/panier.php" method="POST">
            <input type="hidden" value="vide le panier" name="empty_cart">
            <div class="cart-infos" style="position:absolute; bottom:10px;">
            <?php echo "Total panier : " . $ArticleManager->totalCart() . " €" ?> 
            <button style="height: 30px">Valider ma commande</button>
        </form>
        </div>

        
    </div>
</body>
</html>