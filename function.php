<?php
function init($_media_, $_mediaName_){
    header("Content-Type: text/html;charset=utf-8");
    $connect_mysql = mysqli_connect('localhost','root','','resources'); //创建数据库连接
    if(!$connect_mysql){ //如果失败
        die('连接mysql数据库失败'.mysqli_error()); //显示出错误信息
    }
    mysqli_select_db($connect_mysql,'root');
    if(@$_GET['act'] == 'insert'){
        $sql = "insert into $_media_ (name,$_mediaName_,link,extractCode,notes) values ('".$_POST['name']."','".$_POST['$_mediaName_']."','".$_POST['link']."','".$_POST['extractCode']."','".$_POST['notes']."')";
        if(mysqli_query($connect_mysql,$sql)){
            echo "插入数据成功";
        }
        else{
            echo "插入数据失败，请联系我";
        }
    }
    elseif(@$_GET['act'] == 'delete'){
        $select_deleted_sql = "select * from $_media_ where $_mediaName_ ='".$_GET['delateObject']."' LIMIT 1";
        $deleted_sql = mysqli_query($connect_mysql,$select_deleted_sql);
        $row = mysqli_fetch_array($deleted_sql);
        $insert_deleted_sql = "insert into deleted (name,mediaName,link,extractCode,notes) values ('".$row['name']."','".$row[$_mediaName_]."','".$row['link']."','".$row['extractCode']."','".$row['notes']."')";
        $sql = "delete from $_media_ where $_mediaName_ = '".$_GET['delateObject']."' LIMIT 1";
        if(mysqli_query($connect_mysql,$sql)&&mysqli_query($connect_mysql,$insert_deleted_sql)){
            echo "删除数据成功";
        }
        else{
            echo "删除数据失败，请联系我";
        }
        $select_sql = "select * from $_media_ order by rand() limit 10";
        $result = mysqli_query($connect_mysql,$select_sql);
    }
    elseif(@$_GET['act'] == 'search'){
        $select_sql = "select * from $_media_ where $_mediaName_ like '%".$_GET['keyWord']."%'";
        $result = mysqli_query($connect_mysql,$select_sql);
    }
    else{
        $select_sql = "select * from $_media_ order by rand() limit 10";
        $result = mysqli_query($connect_mysql,$select_sql);
    }
    return $result;
}
?>
