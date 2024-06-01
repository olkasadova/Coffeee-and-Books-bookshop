<?php
 
 include ('includes/nav.php');
 require ('db_connection.php');

 $query = "SELECT * FROM books";
 $result = mysqli_query ($link, $query);

 if (mysqli_num_rows ($result)> 0){
    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/home.css" /> 
    <title>Welcome to Coffee and Books </title>
  </head>
<body>

<h3>
    Welcome 
 </h3>   
<div class="full-screen-container">
    <section class = "cards">
    <?php while ($row = mysqli_fetch_array ($result))
{
    ?>
        <a href = "#" class  = "card">
            
            <div class = "card_image" >
                <img src = "./img/<?php echo $row['book_img']; ?>"class = "image" alt = "Book">
            </div>
            <div class = "card_author"> <?php echo $row ['book_author']; ?> </div> 
            <input type = "submit" class = "add_to_cart"  value = " ADD TO CART"> 
            <div class = "card_snippet"> 
                <?php echo $row ['book_desc']; ?>
            </div>
            <div class = "card_price"> <?php echo $row ['item_price']; ?> </div>
            <div class = "card_readmore"> Read More </div>
        </a>
        <?php
     }
            ?>      
    </section>
</div>   


    </div>
    <span class="logout-link">  <a href="logout.php">Logout </a></span>
    </div>

</body>
</html> 

<?php
    mysqli_close ($link);
    }
    else
    {echo '<p> There are no items in the DB to display. </p>'; }
   
    include ('includes/footer.php');
?>   

