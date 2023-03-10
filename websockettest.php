<?php

// Set API endpoint URL
$api_url = "https://api.openai.com/v1/chat/completions";

// Set API request parameters
$data = array(
    "model" => "gpt-3.5-turbo",
    "messages" => $message
);

// Set API request headers
$headers = array(
    "Content-Type: application/json",
    "Authorization: Bearer sk-***"
);

// Initialize curl session
$ch = curl_init();

// Set curl options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute curl session and get API response
$response = curl_exec($ch);

// Close curl session
curl_close($ch);

// Return API response as JSON object
header('Content-Type: application/json');
echo $response;

?>

