<?php
    require_once 'dbconfig.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


    $query = "SELECT * FROM contenuti ";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $response = [];

    header('Content-Type: application/json');

    while ($row = mysqli_fetch_assoc($res)) {
        $response[] = [
            'titolo' => $row['TITOLO'],
            'descrizione' => $row['DESCRIZIONE'],
            'prezzo' => $row['PREZZO'],
            'url' => $row['URL']
        ];
    }

    echo json_encode($response);

    mysqli_free_result($res);
    mysqli_close($conn);

?> 