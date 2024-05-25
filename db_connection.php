<?php
//connection variable
$link = mysqli_connect("localhost", "root", "","coffee_and_books");

//if connection cannot be set show an error and close connection
if (! $link) {
    die ('Could not connect: ' .mysqli_connect_error());
}
else{
    echo "Connected to the database successfully! ";
}


?>