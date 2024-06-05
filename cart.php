<?php
include ('includes/session.php');
include ('includes/nav.php');
//include ('added.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
    foreach  ($_POST ['quantity'] as $book_id=> $book_qty)
    {   
        $id = (int)$book_id;
        $quantity = (int) $book_qty;
    

        if ($quantity == 0){
            unset ($_SESSION ['cart'][$id]);}
        elseif ($quantity > 0){
            $_SESSION ['cart'][$id]['quantity'] = $quantity;}
    }   
}

$total = 0;


if (!empty ($_SESSION ['cart']))
    {
        require ('db_connection.php');

        $query = "SELECT * from books WHERE book_id IN (";
        foreach ($_SESSION['cart'] as $id => $value) { $query .= $id . ','; }

        $query = substr ($query, 0, -1) . ") ORDER BY book_id ASC";
        $result = mysqli_query ($link,  $query);
    
   


        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="styles/cart.css" /> 
            <title>Welcome to Coffee and Books </title>
        </head>
        <body>


        <?php

        //display container
        echo '
                <h2> Shopping cart </h2>
                <div class=\"full-screen-container\">
                    <form class = "cart-book" action = "cart.php" method = "post">;
                        ';

                            while ($row = mysqli_fetch_assoc ($result))
                            {
                                //calculate sub-total
                                $subtotal = $_SESSION ['cart'] [$row ['book_id']]['quantity'] * $_SESSION ['cart'] [$row ['book_id']]['price'];
                                $total += $subtotal;

                                echo 
                                "       <div class=\"input-group\">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <img src = \"./img/{$row['book_img']}\">
                                                    </td>
                                                    <td>   
                                                        <div class = \"name\"> {$row ['book_name']} </div> 
                                                    </td>
                                                    <td>   
                                                        <div class = \"name\"> {$row ['book_author']} </div> 
                                                    </td>
                                                    <td>   
                                                            <div class = \"card_price\"> {$row ['item_price']} </div>
                                                    </td>  
                                                    <td>      
                                                            <input type=\"text\" 
                                                            size=\"3\" 
                                                            name=\"quantity[{$row['book_id']}]\" 
                                                            value=\"{$_SESSION['cart'][$row['book_id']]['quantity']}\">
                                                        <td> 
                                                </tr>
                                            </table>
                                        </div>
                            ";
                        }
                        
                    mysqli_close ($link);

                        
                        ?>
                            <div class = "total-group">
                                    <p class = "total"> Total = &pound $total</p><br>

                                    <p><input type="submit" name="submit" class="update-btn" value="Update My Cart"></p>
                                    <br>
                                    
                                    <a href="checkout.php?total=<?php echo $total;?>" class="checkout-btn">Checkout Now</a><br>
                            </div> 
                    </form>
                </div> 

            ";
 <?php           
 }    
     
else {
    ?>
     <!doctype html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" type="text/css" href="styles/cart.css" /> 
                <title>Welcome to Coffee and Books </title>
            </head>
            
        <div class="full-screen-container">
            <div class = "added-container">
                     <h1 class="added-title" > Your cart is empty  </h1>

                         <a href="home.php">Continue Shopping</a> 
            </div>
        </div>
         
 <?php 
}           

?>  
