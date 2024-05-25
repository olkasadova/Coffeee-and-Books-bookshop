<?php

function validate  ($link, $email="", $password=""){

    $errors = array();

    if (empty ($email)){
        $errors[] = 'Please eEnter you email';}
    else {
        $e = mysqli_real_escape_string ($link, trim($email));
    }

    if (empty ($password)){
        $errors[] = "Please enter your passowrd";
    }
    else{
        $pwd = mysqli_real_escape_string ($link, trim ($password));
    }

   // if both fields email and passowrd are filled we check if user exists in the database 
    if (empty ($errors)){
        $query = "SELECT customer_id, first_name, last_name FROM customer WHERE email = '$e' AND passowrd = '$pwd'";
        $result = mysqli_query ($link, $query);

        $rowcount = mysqli_num_rows($result);
        if ($rowcount==1)
        {
            $row = mysqli_fetch_assoc ($result);
            return array (true, $row);
         }
         else {
            $errors[] = "Your e-mail or passowrd were not found. Please try again";
            return array (false, $errors);
         }
        }
    else{
        $errors[] = "Your email password are empty.";
        }
    return array ( false, $errors); 
    
 }

?>