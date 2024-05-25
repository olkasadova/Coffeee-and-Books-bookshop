<?php
session_start ();
if (!isset ($_SESSION ['customer_id'])) {require ('login.php'); 
    header ('Location: login.php');
}
?>
