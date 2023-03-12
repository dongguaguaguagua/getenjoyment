<?php
// Default OpenAI API key
$defaultApiKey = "sk-***";

// Get the API key from the request or use the default key
$apiKey = isset($_GET['apiKey']) ? $_GET['apiKey'] : $defaultApiKey;

// // GET
// Get the model and messages from the request
$model = $_GET['model'];
$messages = $_GET['messages'];

// Build the request body for OpenAI API
$requestBody = [
    "model" => $model,
    "prompt" => $messages,
    "temperature" => 0.7,
    "max_tokens" => 60,
    "n" => 1,
    "stop" => "\n"
];
// // POST
// $requestBody = json_decode(file_get_contents('php://input'), true);
// $model = $requestBody['model'];
// $messages = $requestBody['messages'];

// Build the headers for the OpenAI API request
$headers = [
    "Content-Type: application/json",
    "Authorization: Bearer ".$apiKey
];

// Make the request to OpenAI API
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://api.openai.com/v1/completions");
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);

if($response===false){
    echo curl_error($curl);
    echo curl_getinfo($curl);
    var_dump($response);
} else {
    // Return the response from OpenAI API
    echo $response;
}

curl_close($curl);

// http://scu.getenjoyment.net/request.php?model=davinci&messages=Hello%20world
// &apiKey=YOUR_API_KEY_HERE
?>
