<?php
include ('includes/session.php');

if (isset ($_GET ['id'])) $id = $_GET ['id'];

require ('db_connection.php');

$query = "SELECT from books WHERE book_id = $id";
$result = mysqli_query ($link, $query);

if (mysqli_num_rows ($result) == 1){
    $row = mysqli_fetch_assoc ($result);
}

if (isset ($_SESSION ['cart'][$id]))
{
    $_SESSION ['cart'][$id]['quantity'] ++;
    echo '
    <div class ="container">
            <p>Another '.$row["item_name"].' has been added to your cart</p>
			<a href="home.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
    </div>;
    '
}
else 
{
   $_SESSION['cart'][$id] = array ('quantity'=> 1, 'price'=> $row['item_price']);
   echo '<div class = "container">
        <p> A '$row ['book_name'].' by '$row ['book_author'].' was added to you cart </p>
        <a href="home.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
   </div>;
   '
}

?>
