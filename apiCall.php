<?php

try {
    #API URL
    $url = "https://shrtlnk.dev/api/v2/link";
    #URL To Short
    $url_toShort = "https://www.youtube.com/watch?v=C-R1qFGFvc0&ab_channel=MalikCodex";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(
        array(
            "url" => $url_toShort
        )
    ));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        #API Key For URL API
        "api-key: DcadHPnk4YAzlvnU3urxj5IZLpoJMFkr8FXHeMk8Pw3KN",
        "Accept: application/json",
        "Content-Type: application/json"
    ));
    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($http_code == 201) {
        $data = json_decode($result, true);
        echo "<pre>";
        echo $data['shrtlnk'];
        echo "</pre>";
        return [
            "shortURL" => isset($data['shrtLnk']) ? $data['shrtLnk'] : false
        ];
    }
    curl_close($ch);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
