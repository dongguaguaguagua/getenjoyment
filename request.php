<?php
require_once 'config.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

$url = "https://api.openai.com/v1/chat/completions";
$requestJson = file_get_contents("php://input");
$requestBody = json_decode($requestJson, true);

$defaultApiKey = API_KEY;
if (isset($defaultApiKey['apikey'])) {
    $apikey = $defaultApiKey['apikey'];
} else {
    $apikey = API_KEY;
}

$headers = [
    "Content-Type: application/json",
    "Authorization: Bearer ".$defaultApiKey,
    'Access-Control-Allow-Origin: *',
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if($response===false){
} else {
    header('Content-Type:application/json; charset=utf-8');
    echo $response;
}

curl_close($curl);

?>
