<?php 

    require_once 'dbconfig.php';
   

    header('Content-Type: application/json');
    
    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);


    $query = "SELECT * FROM contenuti ";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($res)){
        $elementi[] = $row;
    }

    
    echo json_encode($elementi);

    mysqli_free_result($res);
    mysqli_close($conn);
?>
