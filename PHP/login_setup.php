<?php
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include db file
require_once "init.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_user, username, password FROM account WHERE username = :username";
        
        if($stmt = $bdd->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        var_dump(password_verify($password, $hashed_password));
                        if(password_verify($password, $hashed_password)){
                            // Store data in session variables
                            $account = $AccountManager->getByUsername($username);

                            $_SESSION["loggedin"] = true;
                            $_SESSION["username"] = $username;         
                            $_SESSION["is_admin"] = $account->is_admin;         
                                             
                            
                            //If user is an admin
                            if ($account->is_admin == 1){
                                header("Location: ../public/admin.php");
                            }
                            else {
                                // Redirect user to welcome page
                                header("Location: ../public/home.php");
                            }    
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Le mot de passe que vous avez saisi n'était pas valide.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Aucun compte trouvé avec ce nom d'utilisateur.";
                }
            } else{
                echo "Oups ! Quelque chose a mal c'est passer. Veuillez réessayer plus tard.";
            }

            // Close statement
            unset($stmt);
        }
    }
}
?>