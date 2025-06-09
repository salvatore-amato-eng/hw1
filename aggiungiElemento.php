<?php
    require_once 'dbconfig.php';
    
    session_start();

    if(!isset($_SESSION["email"])) {
        echo json_encode(array('exists' => "login"));
        exit;
    }

    if (!isset($_GET["titolo"])) {
        echo "Non dovresti essere qui";
        exit;
    }

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $utente = $_SESSION["email"];
    $titolo_elemento = mysqli_real_escape_string($conn, $_GET["titolo"]);
    
    $query_check = "SELECT * FROM carrello WHERE UTENTE = '$utente' AND PRODOTTO = '$titolo_elemento'";
    $res_check = mysqli_query($conn, $query_check) or die(mysqli_error($conn));   
      
    if (mysqli_num_rows($res_check) === 0) {
        $query = "INSERT INTO carrello (UTENTE,PRODOTTO) VALUES ('$utente','$titolo_elemento')";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
    }


    echo json_encode(array('exists' => mysqli_num_rows($res_check) > 0 ));
    
    
    mysqli_free_result($res_check);
    mysqli_close($conn);

?>