<?php
    session_start();
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
        <?php
            if (isset($_SESSION['account_created'])) {
        ?>        
            <div><?php echo $_SESSION['account_created'];?></div>
        <?php
            unset($_SESSION['account_created']);     
            }
        ?>
        

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="barre_nav">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                  <a class="nav-link" href="#">Features</a>
                  <a class="nav-link" href="#">Pricing</a>
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
              </div>
            </div>
          </nav>
        </nav>


        <div class="container">
            <form action="../PHP/admin_panel/admin_account_panel.php" method="POST">
                <div class="form-col">
                    
                        <input type="email" name="email" placeholder="Email" class="form-control w-25">
                       
                    
                        <input type="text" name="username" placeholder="Username" class="form-control w-25">
                   
                    
                    <input type="password" name="password" placeholder="Password" class="form-control w-25">
                </div>
                <button type="submit" class="btn btn-outline-primary">Add account</button>
            </form>
            <br />
            <br />
        </div>
        

        <?php
            if (isset($_SESSION['account_deleted'])) {
        ?>        
            <div><?php echo $_SESSION['account_deleted'];?></div>
        <?php
            unset($_SESSION['account_deleted']);     
            }
        ?>
        <form action="../PHP/admin_panel/admin_account_panel.php" method="POST">
            <div class="form-row">
                <div class="col">
                    <input type="email" name="delete_email" placeholder="Email" class="form-control">
                </div>    
                <div class="col">
                    <input type="text" name="delete_username" placeholder="Username" class="form-control">
                </div>    
            <button type="submit"  class="btn btn-outline-primary">Delete account</button>
        </form>
        <br />
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
            <input type="email" name="mod_email" placeholder="Account Email"><br />
            <input type="text" name="mod_username" placeholder="New Username"><br />
            <button type="submit">Modify username from account</button>
        </form>    

        <br />
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
            <input type="test" name="mod_username2" placeholder="Account Username"><br />
            <input type="email" name="mod_email2" placeholder="New Email"><br />
            <button type="submit">Modify email from account</button>
        </form>    



        <?php
            if (isset($_SESSION['article_added'])) {
        ?>        
            <div><?php echo $_SESSION['article_added'];?></div>
        <?php
            unset($_SESSION['article_added']);     
            }
        ?>
        <form action="../PHP/admin_panel/admin_article_panel.php" method="POST">
            <input type="text" name="name_article" placeholder="article name"><br />
            <input type="text" name="description_article" placeholder="article description"><br />
            <input type="text" name="quantity_article" placeholder="article quantity"><br />
            <input type="text" name="price_article" placeholder="article price"><br />
            <input type="text" name="category_article" placeholder="article category"><br />
            <button type="submit">Add Article</button>
        </form>
        <br />
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
            <input type="text" name="rm_name_article" placeholder="article name"><br />
            <button type="submit">Remove Article</button>
        </form>



















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

</body>
</html>