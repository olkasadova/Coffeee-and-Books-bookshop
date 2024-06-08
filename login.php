<?php
include ('includes/nav.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/login.css" /> 
    <title>Login to Coffee and Books </title>
  </head>

  <body>
    <div class="full-screen-container">
        <div class = "login-container">

        <h1 class="login-title" > Welcome </h1>

            <form class = "login-form" action="login_action.php" method="POST">

                <div class="input-group">
                    <label for="email"><b>E-mail</b></label>
                    <input type="email" placeholder="Enter e-mail" name="email" data-cy = "login-email" id="email" required>
                </div>
                <div class="input-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" data-cy = "login-passowrd" id="password" required>
                </div>
                <div class="error">
                    <?php if ( isset( $errors ) && !empty( $errors ) ) { foreach ( $errors as $msg ) { echo "  $msg<br>" ; }
                         }?>
                </div>
               
                    <button type="submit" class="login-btn" data-cy = "login-submit" id="login-btn" > Login </button>
                    <div>
                        <span class="register-link"> Register if you do not have an account  <a href="register.php">Register</a></span>
                    </div>
                </div>
            </form>
        </div>    
    </div>
  </body>
</html>

<?php

//session_start();

//if (!isset ($_SESSION ['customer_id'])) {
   // require ('login.php'); 
   //load();
//}


?>

