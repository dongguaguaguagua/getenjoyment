<?php
require_once 'config.php';
$connect_mysql = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$connect_mysql){ //如果失败
    die('连接mysql数据库失败'.mysqli_error()); //显示出错误信息
}
mysqli_select_db($connect_mysql,DB_USER);

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

if($response !== false){
    $insert_sql = "insert into GPT (request,response) values ($requestBody,$response);";
    mysqli_query($connect_mysql,$insert_sql);

    $responseJson = json_decode($response);
    $time = date("Y-m-d H:i:s", $responseJson->created);
    $tokens = $responseJson->usage->total_tokens;
    $insert_sql2 = "insert into GPT_pro (time,tokens,request,response) values (
        $time,
        $tokens,
        $requestJson->messages[0]->content,
        $responseJson->choices[0]->message
    );";
    mysqli_query($connect_mysql,$insert_sql);
    header('Content-Type:application/json; charset=utf-8');
    echo $response;
}

curl_close($curl);
CREATE TABLE GPT_pro (
  time TIMESTAMP NOT NULL,
  tokens INT(11),
  request TEXT,
  response TEXT
);
?>
