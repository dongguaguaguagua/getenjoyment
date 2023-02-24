<?php
function init($_host_,$_user_,$_password_,$_dbname_,$_media_, $_mediaName_){
    header("Content-Type: text/html;charset=utf-8");
    $connect_mysql = mysqli_connect($_host_,$_user_,$_password_,$_dbname_); //创建数据库连接
    if(!$connect_mysql){ //如果失败
        die('连接mysql数据库失败'.mysqli_error()); //显示出错误信息
    }
    mysqli_select_db($connect_mysql,$_user_);
    if(@$_GET['act'] == 'insert'){
        $insert_sql = "insert into $_media_ (name,$_mediaName_,link,extractCode,notes) values ('".$_POST['name']."','".$_POST[$_mediaName_]."','".$_POST['link']."','".$_POST['extractCode']."','".$_POST['notes']."')";
        // echo $insert_sql;
        if(mysqli_query($connect_mysql,$insert_sql)){
            echo "<script>alert('感谢您的无私分享！将刷新页面');</script>";
        }
        else{
            echo "<script>alert('插入数据失败，请联系我');</script>";
        }
        $result = showDefaultResult($connect_mysql,$_media_);
    }
    elseif(@$_GET['act'] == 'edit'){
        $update_sql = "update $_media_ set name=\"".$_POST['name']."\",$_mediaName_=\"".$_POST[$_mediaName_]."\",link=\"".$_POST['link']."\",extractCode=\"".$_POST['extractCode']."\",notes=\"".$_POST['notes']."\" where $_mediaName_=\"".$_GET['name']."\";";
        echo $update_sql;
        if(mysqli_query($connect_mysql,$update_sql)){
            echo "<script>alert('感谢您的修改！将刷新页面');</script>";
        }
        else{
            echo "<script>alert('修改数据失败，请联系我');</script>";
        }
        $result = showDefaultResult($connect_mysql,$_media_);
    }
    elseif(@$_GET['act'] == 'delete'){
        $select_deleted_sql = "select * from $_media_ where $_mediaName_ ='".$_GET['delateObject']."' LIMIT 1";
        $deleted_sql = mysqli_query($connect_mysql,$select_deleted_sql);
        $row = mysqli_fetch_array($deleted_sql);
        if(!empty($row[$_mediaName_]))
        {
            $insert_deleted_sql = "insert into deleted (name,mediaName,link,extractCode,notes) values ('".$row['name']."','".$row[$_mediaName_]."','".$row['link']."','".$row['extractCode']."','".$row['notes']."')";
            $sql = "delete from $_media_ where $_mediaName_ = '".$_GET['delateObject']."' LIMIT 1";
            if(mysqli_query($connect_mysql,$sql)&&mysqli_query($connect_mysql,$insert_deleted_sql)){
                echo "<script>alert('删除数据成功！将刷新页面');</script>";
            }
            else{
                echo "<script>alert('删除数据失败，请联系我');</script>";
            }
        }else{
            echo "<script>alert('删除数据失败，为找到相关数据');</script>";
        }
        $result = showDefaultResult($connect_mysql,$_media_);
    }
    elseif(@$_GET['act'] == 'search'){
        $select_sql = "select * from $_media_ where $_mediaName_ like '%".$_GET['keyWord']."%'";
        $result = mysqli_query($connect_mysql,$select_sql);
    }
    else{
        $result = showDefaultResult($connect_mysql,$_media_);
    }
    return $result;
}
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
?>
