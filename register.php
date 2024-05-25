<?php
include ('includes/nav.php');
?>

<?php

//check if a form was submitted with Post request
    if ($_SERVER ['REQUEST_METHOD']=='POST') 
    {
        require ('connect_db.php');
        require ( 'login_validations.php' ) ;
    
//initialize error array
$errors = array();

}
?>