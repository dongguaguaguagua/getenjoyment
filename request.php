<?php
// Default OpenAI API key
$defaultApiKey = "sk-***";
$url = "https://api.openai.com/v1/chat/completions";
// // GET
// Get the model and messages from the request
// $messages = $_GET["messages"];
// Get the API key from the request or use the default key
// $apiKey = isset($_GET['apiKey']) ? $_GET['apiKey'] : $defaultApiKey;
// POST
$requestBody = json_decode(file_get_contents("php://input"), true);
$model = $requestBody['model'];
$messages = $requestBody['messages'];
$apiKey = $defaultApiKey;

// Build the request body for OpenAI API
$requestBody = [
    "model" => $model,
    "messages" => $messages,
];

// Build the headers for the OpenAI API request
$headers = [
    "Content-Type: application/json",
    "Authorization: Bearer ".$apiKey,
    'Access-Control-Allow-Origin: *',
];

// Make the request to OpenAI API
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if($response===false){
    // var_dump($response);
} else {
    // Return the response from OpenAI API
    echo $response;
}

curl_close($curl);

?>
