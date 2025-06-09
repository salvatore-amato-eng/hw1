<?php
    require_once 'dbconfig.php';

    session_start();


    if (!isset($_GET["titolo"])) {
        echo "Non dovresti essere qui";
        exit;
    }

    $utente = $_SESSION["email"];
    
    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $url = mysqli_real_escape_string($conn, $_GET["link"]);
    $titolo_elemento = mysqli_real_escape_string($conn, $_GET["titolo"]);
    $descrizione_elemento = mysqli_real_escape_string($conn, $_GET["descrizione"]);
    $prezzo_elemento = $_GET["prezzo"];
    
    $query_check1 = "SELECT * FROM contenuti WHERE titolo='$titolo_elemento'";
    $res1 = mysqli_query($conn, $query_check1) or die(mysqli_error($conn));
    if (mysqli_num_rows($res1) === 0) {
        $query1 = "INSERT INTO contenuti  VALUES ('$url','$titolo_elemento','$descrizione_elemento','$prezzo_elemento')";
        $res = mysqli_query($conn, $query1) or die(mysqli_error($conn));
        
    }

    $query_check2 = "SELECT * FROM carrello WHERE UTENTE='$utente' AND PRODOTTO='$titolo_elemento'";
    $res1 = mysqli_query($conn, $query_check2) or die(mysqli_error($conn)); 
    if (mysqli_num_rows($res1) === 0) {
        $query2 = "INSERT INTO carrello (UTENTE,PRODOTTO) VALUES ('$utente','$titolo_elemento')";
        $res2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        
    }

  


    echo json_encode(array('exists' => mysqli_num_rows($res1) > 0));
    //echo array('exists' => mysqli_num_rows($res1) > 0);


    mysqli_free_result($res1);

    mysqli_close($conn);
   
?>