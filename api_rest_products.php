<?php
    
    if(!isset($_GET['partnumber'])){
        echo json_encode(array("error" => "No request data provided"));
        exit;
    }

    $api_key = 'secret';

    $headers = array("Content-Type: application/json");

    $request = array(
            "SearchByPartRequest" => array(
                "mouserPartNumber" => $_GET['partnumber'],
                "partSearchOptions" => 'None'
            )
    );
    

    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,
     'https://api.mouser.com/api/v1/search/partnumber?apiKey='.$api_key);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    echo $result;

?>