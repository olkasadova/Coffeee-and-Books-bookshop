<?php
session_start();
if (!isset($_SESSION ['customer_id'])) {
  header ('Location: login.php');    // New PHP Session / Should Only Be Run Once/Rarely/Login/Logout
   ////
}
?>
<?php