<?php
include ('includes/session.php');
include ('includes/nav.php');
require ('db_connection.php');
?>

<?php
//select all items and show to user
    $query = "SELECT * FROM books";
    $result = mysqli_query ($link, $query);


if (mysqli_num_rows ($result)> 0)
 
{
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
        
        <div class="full-screen-container">
            <section class = "cards">
        
                <?php 
                    while ($row = mysqli_fetch_array ($result))
                    //for each record found in the database display a separate card 
                    {
                ?>
                        <div class  = "card">
                            
                            <div class = "card_image" >
                                <img src = "./img/<?php echo $row['book_img']; ?>"class = "image" alt = "Book">
                            </div>
                            <div class = "card_author" data-cy = "card_author"> <?php echo $row ['book_author']; ?> </div> 
                            <div class = "card_snippet"> 
                                <?php echo $row ['book_desc']; ?>
                            </div>
                            <div class = "card_price" data-cy = "card_price"> <?php echo $row ['item_price']; ?> </div>
                            <div class = "card_readmore"> Read More </div>
                            <div class = "add-cart"> <a data-cy = "add-cart" href="added.php?id=<?php echo $row['book_id'];?>" >Add to Cart</a></div>
                        
                        </div>
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
//display a message if there are no books to display
 else
    {echo '<p> There are no items in the DB to display. </p>'; }
   
include ('includes/footer.php');
?>   

