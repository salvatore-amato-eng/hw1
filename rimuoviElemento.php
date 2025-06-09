<?php
    require_once 'dbconfig.php';

    session_start();

    if(!isset($_SESSION["email"])) {
        header("Location: login.php");
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


    $query = "DELETE FROM carrello WHERE UTENTE = '$utente' AND PRODOTTO = '$titolo_elemento'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $query_somma = "SELECT SUM(P.PREZZO) FROM carrello C JOIN UTENTI U on U.EMAIL = C.UTENTE 
                                       JOIN CONTENUTI P ON C.PRODOTTO = P.TITOLO 
                                       where C.UTENTE = '$utente'";

    $res_somma = mysqli_query($conn, $query_somma) or die(mysqli_error($conn));
    
    $somma = mysqli_fetch_row($res_somma);

    echo json_encode(array('exists' => $res,'somma'=> $somma[0]));

    mysqli_free_result($res_somma);
    mysqli_close($conn);

?>