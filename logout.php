<?php

session_start();
//setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();
header('Location: home.php');


//session_unset();
//session_destroy();

//echo $_SESSION ['first_name'];
exit;
?>