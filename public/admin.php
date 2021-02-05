<?php
    require_once "../PHP/init.php";
    if ((!$_SESSION["loggedin"]) || ($_SESSION['is_admin'] != 1)){
        header('Location: login.php');

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>Hello, world!</title>
  </head>
  <body>
      

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="barre_nav">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Bar d'administration</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                  <a class="nav-link" href="#Account">Account_manager</a>
                  <a class="nav-link" href="#Article">Article_manager</a>
                </div>
              </div>
            </div>
          </nav>
        </nav>


        <div class="big_box">
            <div class="small_box pretty_box sketchy">
                <?php
                    if (isset($_SESSION['account_created'])) {
                ?>        
                    <div><?php echo $_SESSION['account_created'];?></div>
                <?php
                    unset($_SESSION['account_created']);     
                    }
                ?>
            
                <form action="../PHP/admin_panel/admin_account_panel.php" method="POST">
                    <div class="form-col">
                        <input type="email" name="email" placeholder="Email" class="form-control">
                        <input type="text" name="username" placeholder="Username" class="form-control">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Add account</button>
                </form>
                <br />
                
            

                <?php
                    if (isset($_SESSION['account_deleted'])) {
                ?>        
                    <div><?php echo $_SESSION['account_deleted'];?></div>
                <?php
                    unset($_SESSION['account_deleted']);     
                    }
                ?>
                <form action="../PHP/admin_panel/admin_account_panel.php" method="POST">
                    <div class="form-col">
                        <input type="email" name="delete_email" placeholder="Email" class="form-control">
                        <input type="text" name="delete_username" placeholder="Username" class="form-control">
                    </div>    
                    <button type="submit"  class="btn btn-outline-primary">Delete account   </button>
                </form>
                <br />
                

                <?php
                    if (isset($_SESSION['username_modified'])) {
                ?>        
                    <div><?php echo $_SESSION['username_modified'];?></div>
                <?php
                    unset($_SESSION['username_modified']);     
                    }
                ?>
                <form action="../PHP/admin_panel/admin_account_panel.php" method="POST">
                    <div class="form-col">
                        <input type="email" name="mod_email" placeholder="Account Email" class="form-control">
                        <input type="text" name="mod_username" placeholder="New Username" class="form-control">
                    </div>    
                    <button type="submit" class="btn btn-outline-primary">Modify user from account</button>
                </form>    
                <br />
            
                <?php
                    if (isset($_SESSION['email_modified'])) {
                ?>        
                    <div><?php echo $_SESSION['email_modified'];?></div>
                <?php
                    unset($_SESSION['email_modified']);     
                    }
                ?>
                <form action="../PHP/admin_panel/admin_account_panel.php" method="POST">
                    <div class="form-col">
                        <input type="test" name="mod_username2" placeholder="Account Username" class="form-control">
                        <input type="email" name="mod_email2" placeholder="New Email" class="form-control">
                    </div>    
                    <button type="submit" class="btn btn-outline-primary">Modify email from account</button>
                </form> 
            </div>
            
            <div class="small_box pretty_box">
                <?php
                    if (isset($_SESSION['article_added'])) {
                ?>        
                    <div><?php echo $_SESSION['article_added'];?></div>
                <?php
                    unset($_SESSION['article_added']);     
                    }
                ?>
                <form action="../PHP/admin_panel/admin_article_panel.php" method="POST">
                    <div class="form-col">
                        <input type="text" name="name_article" placeholder="article name" class="form-control">
                        <input type="text" name="description_article" placeholder="article description" class="form-control">
                        <input type="text" name="quantity_article" placeholder="article quantity" class="form-control">
                        <input type="text" name="price_article" placeholder="article price" class="form-control">
                        <input type="text" name="category_article" placeholder="article category" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Add Article</button>
                </form>
                <br />
               

                <?php
                    if (isset($_SESSION['article_removed'])) {
                ?>        
                    <div><?php echo $_SESSION['article_removed'];?></div>
                <?php
                    unset($_SESSION['article_removed']);     
                    }
                ?>
                <form action="../PHP/admin_panel/admin_article_panel.php" method="POST">
                    <div class="form-col">
                        <input type="text" name="rm_name_article" placeholder="article name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Remove Article</button>
                </form>
            </div>  
        </div>

        <div class="product_container">
        <?php
            $sql = "SELECT * FROM article";
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            while($articles = $stmt->fetch(PDO::FETCH_ASSOC)){
                $article_name = $articles["name_article"];
                $article_description = $articles["description_article"];
                $article_price = $articles["price_article"];
                $article_category = $articles["category_article"];
                $article_image = $articles["image"] ?>
                    <div class="product pretty_box">
                        <img class="product_image" src="assets/<?php echo $article_image ?>" alt="<?php echo $article_image?>">
                        <p>Article : <?php echo $article_name ?> || Price : <?php echo $article_price ?> euros  || Category : <?php echo $article_category ?> </p>
                        <p>Description : <?php echo $article_description ?></p>
                            <form action="../PHP/admin_panel/admin_article_panel.php" methode="POST">   
                                <input type="text" name="remove_article" value="<?php echo $article_name ?>">
                                <button type="submit" class="btn btn-outline-primary">Delete Article</button>
                            </form>

                    </div>    
            <?php
            }
            ?>    
        </div>




        
        




















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

</body>
</html>