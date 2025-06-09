<?php
    require_once 'dbconfig.php';

    session_start();

    if(!isset($_SESSION["email"])) {
        header("Location: login.php");
        exit;
    }

?>

<html>
    <head>
        <title>ST's Carts</title>
        <link rel = "stylesheet" href = "carrello.css">
        <script src = "carrello.js"defer></script>
         <meta name = "viewport" content = "width=device-width, initial-scale = 1">
    </head>

    <body>
        <nav>
            <div class = "topnav">
                <img src = "logo_St.svg">
                <!-- <input type = "text" value = "Search a part number"></input> -->
            </div>

            <div class = "nav_dx">
                  <span class = "homepage"><a href = "index.php">Home Page</a></span>
                <a href = "carrello.php"><img src = "shopping-cart-icn.svg"></a>
            </div>
        </nav>


        <section>
            <div class = "top_section">
                <h1 class = "title">Your Products</h1>
                <h1><a href = "elenco_prodotti.php">All Products</a></h1>
            </div>
        </section>

    </body>
</html>

