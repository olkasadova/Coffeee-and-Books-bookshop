<?php
include ('includes/session.php');

if (isset ($_GET ['id'])) $id = $_GET ['id'];

require ('db_connection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/added.css" /> 
    <title>Welcome to Coffee and Books </title>
  </head>
<body>

<?php
$query = "SELECT * from books WHERE book_id = $id";
$result = mysqli_query ($link, $query);

if (mysqli_num_rows ($result) == 1){
    $row = mysqli_fetch_assoc ($result);
}

if (isset ($_SESSION ['cart'][$id]))
{
    $_SESSION ['cart'][$id]['quantity'] ++;
?>

<div class="full-screen-container">
    <div class = "added-container">

    <h1 class="added-title" > Congratulations! </h1>

            <div class="input-group">
                <p>One more "<?php echo $row ['book_name']; ?>"  by <?php echo $row ['book_author']; ?>  was added to your cart</p>
                <a href="home.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
               
            </div>
    </div>  
</div>';

<?php    
}
else 
{
   $_SESSION['cart'][$id] = array ('quantity'=> 1, 'price'=> $row['item_price']);

 ?>
        <div class="full-screen-container">
            <div class = "added-container">

            <h1 class="added-title" > Congratulations!  </h1>

                    <div class="input-group">
                      <p> A "<?php echo $row ['book_name']; ?>"  by <?php echo $row ['book_author']; ?>  was added to your cart</p>
                        <a href="home.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
                    
                    </div>
            </div>  
        </div>';
<?php        
}

?>
