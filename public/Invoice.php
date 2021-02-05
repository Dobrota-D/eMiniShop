<?php
require_once "../PHP/init.php";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résumé</title>
</head>
<body>
    <p>Voici un résumé de votre panier</p>
    <?php
    for ($i=0; $i < count($_SESSION['panier']) ; $i++) {  ?>
        <p style="display:inline; margin-right:5px"><?php echo $_SESSION['panier'][$i][0] ?></p>
        <p style="display:inline"><?php echo $_SESSION['panier'][$i][1] . '€' ?></p><br />
        <?php
        
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