<?php
require_once 'config.php';

//connect mysql database
$connect_mysql = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$connect_mysql){ //如果失败
    die('连接mysql数据库失败'.mysqli_error()); //显示出错误信息
}
mysqli_select_db($connect_mysql,DB_USER);

// fix: 已拦截跨源请求：同源策略禁止读取位于 xxx 的远程资源。（原因：CORS 头缺少 ‘Access-Control-Allow-O)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
// Default OpenAI API key
$defaultApiKey = API_KEY;

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
    $insert_sql = "insert into GPT (request,response) values ($requestBody,$response);";
}

curl_close($curl);

?>
