<?php
require_once 'config.php';

function showDefaultResult($connect_mysql,$_media_){
    $count_data = "select count(*) from $_media_";
    $count_data_result = mysqli_query($connect_mysql,$count_data);
    $row = mysqli_fetch_row($count_data_result);
    $AllMediaCount = (int)$row[0];
    $startMediaCount = $AllMediaCount - 10;
    if($startMediaCount < 0){
        $startMediaCount = 0;
    }
    $select_sql = "select * from $_media_ limit $startMediaCount,$AllMediaCount";
    $result = mysqli_query($connect_mysql,$select_sql);
    return $result;
}

$connect_mysql = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$connect_mysql){
    die('连接mysql数据库失败'.mysqli_error());
}
mysqli_select_db($connect_mysql,DB_USER);
$data = showDefaultResult($connect_mysql, "GPT");
echo $data;
?>
