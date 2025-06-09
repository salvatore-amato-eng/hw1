<?php 
    require_once 'dbconfig.php';

    session_start(); 

    if (isset($_SESSION["email"])) {
        header("Location: index.php");
        exit;
    }
    
    if(isset($_POST)) {
    

    if (!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"]) && !empty($_POST["email_confirm"]) && 
        !empty($_POST["password"]) && !empty($_POST["repeat_password"]))
    {
        
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        
    
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM utenti WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }
        

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti, ALMENO 8 caratteri";
        } 
           

        if (strcmp($_POST["password"], $_POST["repeat_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }

     

        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['first_name']);
            $surname = mysqli_real_escape_string($conn, $_POST['last_name']);
            $sex = $_POST['salutation'];
            $function = $_POST['function'];
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

               
            $query = "INSERT INTO utenti (email, sex, nome, cognome, password, function) VALUES ('$email', '$sex', '$name', '$surname','$password', '$function')";
                
            if ($res = mysqli_query($conn, $query)) {
                $_SESSION["email"] = $_POST["email"];
                mysqli_close($conn);
                header("Location: index.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
} 
?>

<html>
    <head>
        <title>My ST Registration</title>
        <link rel = "stylesheet" href = "registration.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src = "registration.js" defer></script>
    </head>
    <body>
        <div class = "container"><img class="logo" src = "logo_St_blu.svg"><h1>my.st.com account creation</h1></div>
        <h3>Your Profile</h3>

        <section>
            <form name = "registration" method = "post">
                <p><label> Salutation: <select name = "salutation"> 
                                        <option value = "Mr">Mr</option>
                                        <option value = "Ms">Ms</option>
                                    </select></label></p>
                <p><label>First name:<input type = "text" name = "first_name"></label></p><span class = "name_error"></span>
                <p><label>Last-name:<input type = "text" name = "last_name"></label></p><span class = "surname_error"></span>
                <p><label>Email-address:<input type = "text" name = "email"></label></p><span class = "email_error"></span>
                <p><label>Email-confirmation:<input type = "text" name = "email_confirm"></label></p><span class = "email_matching_error"></span>
                <p><label>Password:<input type = "password" name = "password"></label></p>
                <p><label>Repeat Password:<input type = "password" name = "repeat_password"></label></p><span class = "password_matching_error"></span>
                <p><label>Function:<select name = "function"> 
                                        <option value = "Digital Engineer">Digital Engineer</option>
                                        <option value = "Field Application Engineer">Field Application Engineer</option>
                                        <option value = "Software Engineer">Software Engineer</option>
                                        <option value = "Student or Professor">Student or Professor</option>
                                    </select></label></p>
                <h4>Please review our Privacy Statement that describes how we process your profile information and how to assert your personal data protection rights</h4>
                <p><input id="accetta_termini" type = "checkbox" name = "terms_use[]" value = "acept">I accept the Terms of Use</input></p><span class = "check_error"></span>
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<span>". $err . "</span><br>";
                    }
                } ?>
                <label> &nbsp; <input class = "button" type = "submit" name = "reg" value = "Register"></input></label> 
            </form>
        </section>

        
    </body>
</html>