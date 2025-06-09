<?php
    require_once "dbconfig.php" ;

    session_start(); 

    if (isset($_SESSION["email"])) {
        header("Location: index.php");
        exit;
    }

    if(isset($_POST["email"]) && isset($_POST["password"]) ) {

        if (!empty($_POST["email"]) && !empty($_POST["password"]) ) {

            $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            
            $query = " SELECT EMAIL,PASSWORD FROM UTENTI WHERE EMAIL = '$email'";

            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;

            if (mysqli_num_rows($res) == 1) {
                    
                    $entry = mysqli_fetch_assoc($res);
        
                    if(password_verify($_POST['password'], $entry['PASSWORD']))
                    {
                        $_SESSION["email"] = $entry['EMAIL'];
                        header("Location: index.php");
                        mysqli_free_result($res);
                        mysqli_close($conn);
                        exit;
                    }
            }
            $error = "Username e/o password errati.";
        }
        else {
        
        $error = "Inserisci email e password.";
       
        } 
    }
?>


<html>
    <head>
        <title>myst.com</title>
        <link rel = "stylesheet" href = "login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <nav>
            <img src = "st-logo_login.svg">
        </nav>
        <section>
            <div class = "login">
                <h1>Already register?</h1>
                <h4>Enter your e-mail address and password to login your myST user.</h4>

                <form name = "login" method = "post">
                    <label>Email-address<input type = "text" name = "email"></label>
                    <label>Password<input type = "password" name = "password"></label>
                    <input class = "button" type = "submit" name = "invio_login" value = "Login"></input>
                    <?php if (isset($error)) {
                        echo "<p class='error'>$error</p>";
                        }
                    ?>
                
                </form>
            </div>

            <div class = "nuovo_utente">
                <h1>New user?</h1>
                <h4>myST brings you a set of personalized features:</h4>
                <ul>
                    <li>Participate to ST Events</li>
                    <li>Stay informed with ST eNewsletters</li>
                    <li>Get help with ST Online Support</li>
                    <li>Discuss on the ST Community</li>
                    <li>Benefit from our Online Design Tools</li>
                    <li>Download Software</li>
                    <li>Order free samples</li>
                    <li>Manage your weekly product updates</li>
                    <li>Buy ST Products & Tools</li>
                </ul>
                <a href = "registration.php">Create Account</a>
            </div>
        </section>
        <footer>
            <h4>All rights reserved © 2021 STMicroelectronics Terms of use | Sales Terms & Conditions | Trademarks | Privacy Portal | Manage Cookies</h4>
        </footer>
    </body>
</html>