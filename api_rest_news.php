<?php 
    if(!isset($_GET['notizia']))
        echo json_encode(array("error" => "No request data provided"));
 
    $headers = array("Content-Type: application/json");


    $ricerca = $_GET['notizia'];

    $api_key = 'secret';
    
    $curl = curl_init(); 
    curl_setopt($curl,CURLOPT_URL,
     'https://newsapi.org/v2/everything?q='.$ricerca.'&apiKey='.$api_key);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($curl);
    curl_close($curl);
    echo $result;

?>

    