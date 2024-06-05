
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/nav.css" /> 
    <title>Navigate to Coffee and Books </title>
  </head>

<body>
    <nav>
        <div class = "logo">
            
            <p class = "welcome">
                Welcome 
                <?php if (isset($_SESSION ['customer_id'])) {echo "{$_SESSION ['first_name']}";} ?>
            </p> 
        </div>
        <ul>
            
            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Shopping Cart</a>
             </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>  
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>      
        </ul>    
    </nav>    
</body>
</html>  