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

            <form class = "login-form" action="register.php" method="POST">
                 <div class="input-group">
                    <label for="first-name"><b>First Name</b></label>
                    <input type="first-name" name="first-name" placeholder="Enter your first name" id="first-name" required
                        value = "<?php if (isset ($_POST ['first-name'])) echo $_POST['first-name'];?>">
                </div>
                <div class="input-group">
                    <label for="last-name"><b>Last Name</b></label>
                    <input type="last-name" name="last-name" placeholder="Enter your last name" id="last-name" required
                        value = "<?php if (isset ($_POST ['last-name'])) echo $_POST['last-name'];?>">
                </div>

                <div class="input-group">
                    <label for="email"><b>E-mail</b></label>
                    <input type="email" placeholder="Enter e-mail" name="email" id="email" required
                     value = "<?php if (isset ($_POST ['email'])) echo $_POST['email'];?>">
                </div>
                <div class="input-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter password" name="password" id="password" required
                     value = "<?php if (isset ($_POST ['password'])) echo $_POST['password'];?>">
                </div>
                <div class="input-group">
                    <label for="re-psw"><b>Re-enter Password</b></label>
                    <input type="password" placeholder="Re-enter password" name="re-password" id="re-password" required
                     value = "<?php if (isset ($_POST ['re-password'])) echo $_POST['re-password'];?>">
                </div>

                <div class="error"> succsess
                    <?php  
                    if ( isset( $errors ) && !empty( $errors ) ) { foreach ( $errors as $msg ) { echo "  $msg<br>" ; }
                         }?>
                </div>

                    <button type="submit" class="register-btn" id="register-btn" > Register </button>
                    <div>
                        <span class="login-link"> Have an account already?  <a href="login.php">Login</a></span>
                    </div>

                    <div> <?php  if (isset($res)){ echo "You are successfully registered!";} ?>
                    </div>    
                </div>
            </form>
        </div>    
    </div>
  </body>
</html>

<?php

//check if a form was submitted with Post request
    if ($_SERVER ['REQUEST_METHOD']=='POST') 
    {
        require ('db_connection.php');
       
        $errors = array();

        if (empty ($_POST['first-name'])){
            $errors[] = "Please enter your first name";
        }
        else{
            $first_name = mysqli_real_escape_string ($link, trim ($_POST['first-name']));
        }

        if (empty ($_POST['last-name'])){
            $errors[] = "Please enter your last name";
        }
        else{
            $last_name = mysqli_real_escape_string ($link, trim ($_POST['last-name']));
        }

        if (empty ($_POST['email'])){
            $errors[] = "Please enter your e-mail address";
        }
        else{
            $email = mysqli_real_escape_string ($link, trim ($_POST['email']));
        }

        //check that passord and re-entered password do match
        if (!empty ($_POST ['password'])){
                if ($_POST['password'] != $_POST['re-password']){
                    $errors[] = "Passwords do not match";
                }
                else{
                    $pwd = mysqli_real_escape_string ($link, trim ($_POST['password']));
                }
            }
        else{
            $errors[] = "Please enter your password";
            }

         //check if email is in the database   
        if (empty ($errors)){
            $query = "SELECT customer_id FROM customer WHERE email = '$email'";
            $result = mysqli_query ($link, $query);
            if (mysqli_num_rows($result) != 0) {
                $errors[] = "Email address is already regitered. Please login";
            }
        } 
     //insert a new user
     if (empty ($errors)){
        $q = "INSERT INTO customer (first_name, last_name, email, passowrd, reg_date) 
            VALUES ('$first_name', '$last_name', '$email', '$pwd', NOW())";
            $res = mysqli_query ($link, $q);

     }  
     if ( isset( $errors ) && !empty( $errors ) ) 
     { foreach ( $errors as $msg ) { echo "  $msg<br>" ; } 


    mysqli_close ($link);    
        exit();
    }
    return $errors;
    }
    
?>
