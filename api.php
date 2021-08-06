<?php
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://football-sentiment.p.rapidapi.com/tweets/?Page=1&score_below=0.0",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: football-sentiment.p.rapidapi.com",
            "x-rapidapi-key: 63b490086dmshdf7ad6a8b982b49p1cad70jsnc640d027b7d5"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if($err){
        echo "cURL Error #:" . $err;
    }else{
        echo $response;
    }