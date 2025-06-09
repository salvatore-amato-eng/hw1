<?php 
    require_once 'dbconfig.php';
    session_start();
    
    if(!isset($_SESSION["email"])) {
        header("Location: login.php");
        exit;
    }

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $utente = $_SESSION['email'];

    $query = "SELECT * FROM carrello C JOIN UTENTI U on U.EMAIL = C.UTENTE 
                                       JOIN CONTENUTI P ON C.PRODOTTO = P.TITOLO 
                                       where C.UTENTE = '$utente' ";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $response = [];
    while($row = mysqli_fetch_assoc($res)) {
        $response[] = [
            'titolo' => $row['TITOLO'],
            'utente' => $row['UTENTE'],
            'prezzo' => $row['PREZZO'],
            'descrizione' => $row['DESCRIZIONE'],
            'immagine' => $row['URL']
        ];
    }

    $query_somma = "SELECT SUM(P.PREZZO) FROM carrello C JOIN UTENTI U on U.EMAIL = C.UTENTE 
                                       JOIN CONTENUTI P ON C.PRODOTTO = P.TITOLO 
                                       where C.UTENTE = '$utente'";

    $res_somma = mysqli_query($conn, $query_somma) or die(mysqli_error($conn));
    
    $somma = mysqli_fetch_row($res_somma);

    echo json_encode([
        'response' => $response,
        'somma' => $somma[0]
    ]);
        
    mysqli_free_result($res);
    mysqli_free_result($res_somma);
    mysqli_close($conn);

?> 