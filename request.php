<?php
// header('Content-Type:application/text');  //此声明非常重要
// Set API endpoint URL
$api_url = "https://api.openai.com/v1/chat/completions";
// echo $api_url;
// Set API request parameters
$data = array(
    "model" => "gpt-3.5-turbo",
    // "messages" => $_GET['message']
    "messages" => "{'role':'user', 'content': 'Hello here!'}",
);
// echo "{'role':'user', 'content': 'Hello here!'}\n";
// Set API request headers
$headers = array(
    "Content-Type: application/json",
    "Authorization: Bearer sk-***",
    "Access-Control-Allow-Origin: *",
);
// echo "Authorization: Bearer sk-***\n";
// Initialize curl session
$ch = curl_init();
// echo "init complete\n";
// Set curl options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// echo "set option complete\n";

// Execute curl session and get API response
$response = curl_exec($ch);

// echo "curl exec complete\n";
// Close curl session
curl_close($ch);
// echo "curl close complete\n";

// Return API response as JSON object
header("Content-Type:text/html; charset=utf-8");
echo "echo resp complete:";
echo '变量类型为：'.gettype($response);
echo '变量为：'.strval($response);

?>

