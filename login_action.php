<?php

//check if a form was submitted with Post request
if ($_SERVER ['REQUEST_METHOD']=='POST') 
    {
        require ('db_connection.php');
        require ('login_validation.php');
        
        list ($check, $data)  = validate ($link, $_POST ['email'], $_POST ['password']);
 
        if ($check){
            session_start();
            $_SESSION ['customer_id'] = $data['customer_id'];
            $_SESSION ['first_name'] = $data['first_name'];
            $_SESSION ['last_name'] = $data['last_name'];
            header ('Location: home.php');
        }
        else{
            {$errors = $data;}
        }
        mysqli_close( $link ) ;
        include ( 'login.php' ) ; 
}
?>