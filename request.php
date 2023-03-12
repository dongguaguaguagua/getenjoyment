<?php
// Default OpenAI API key
$defaultApiKey = "sk-***";
// OpenAI api url
$url = "https://api.openai.com/v1/chat/completions";
// get POST data
$requestBody = json_decode(file_get_contents("php://input"), true);

// Build the headers for the OpenAI API request
$headers = [
    "Content-Type: application/json",
    "Authorization: Bearer ".$defaultApiKey,
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
