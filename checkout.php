<?php
include ('includes/session.php');

?>

<?php

//check if the total is 
if ( isset ($_GET ['total']) )
{
        require ('db_connection.php');

        $query_insert = "INSERT INTO customer_order ( customer_id, order_price, order_status, order_datetime ) 
            VALUES 
            (". $_SESSION['customer_id'].",
            ".$_GET['total'].", 
            'Active', 
             NOW() ) ";
        $res_insert = mysqli_query ($link, $query_insert);

        //get order id
        $order_id = mysqli_insert_id ($link);

        //get all order items
            $query_select = "SELECT * from books WHERE book_id IN (";
            foreach ($_SESSION['cart'] as $id => $value) { $query_select .= $id . ','; }

            $query_select = substr ($query_select, 0, -1) . ") ORDER BY book_id ASC";
            $result = mysqli_query ($link,  $query_select);
            //print_r ($result);

        while ($row = mysqli_fetch_assoc ($result))
            {   
                $query = "INSERT INTO order_details  (book_id, item_price, order_id, quantity) VALUES 
                (   ".$row ['book_id'].",
                    ".$row ['item_price'].",
                      $order_id,
                    ".$_SESSION ['cart'][$row ['book_id']]['quantity']." 
                )";

             $result_ins = mysqli_query ($link, $query);
            }  
            mysqli_close($link);
        echo "<p> We are processing your order. Order Number is № $order_id</p> ";
}
else{
    echo "no condition";
}