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
        $qty = (int) $book_qty;
    }

    if ($qty == 0){
        unset ($_SESSION ['cart'][$id]);}
    elseif ($qty > 0){
        $_SESSION ['cart'][$id]['quantity'] = $qty;
    }   
}

$total = 0;

if (!empty ($_SESSION ['cart']))
{
    require ('db_connection.php');

    $query = "SELECT * from books WHERE book_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { $query .= $id . ','; }

    $query = substr ($query, 0, -1) . ") ORDER BY book_id ASC";
}


$result = mysqli_query ($link, $query);

//display container
echo '<div class = "container" 
    <h2> Shopping cart </h2>
    <form action = "cart.php" method = "post">;
            </div>';

        while ($row = mysqli_fetch_assoc ($result))
        {
            //calculate sub-total
            $subtotal = $_SESSION ['cart'] [$row ['book_id']]['quantity'] * $_SESSION ['cart'] [$row ['book_id']]['price'];
            $total += $subtotal;

            echo 
            " <img src = \"./img/{$row['book_img']}\">
                
                <div class = \"name\"> {$row ['book_name']} </div> 
                <div class = \"card_price\"> {$row ['item_price']} </div>
                <input type=\"text\" 
                size=\"3\" 
                name=\"[{$row['book_id']}]\" 
                value=\"{$_SESSION['cart'][$row['book_id']]['quantity']}\">
                
            ";
        }
        mysqli_close ($link);

            echo '
                
                <div>
                <p>Total = &pound '.number_format($total,2).'</p>
                </div>

                <p><input type="submit" name="submit" class="update-btn" value="Update My Cart"></p>
                <br>
                <a href="checkout.php?total='.$total.'" class="checkout-btn">Checkout Now</a><br>
    </form>' ;
