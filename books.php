<?php
require_once 'function.php';
$result=init("localhost","root","","resources","books","bookName");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>scu资源共享站-书籍</title>
</head>
<style>

table#searchShow{
    width : 1424px;
    /* 只有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
    table-layout : fixed;
}

/*溢出部分样式*/

td.link{
    width:100px;
    word-break:keep-all;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}

</style>
<body>
    <center>
    <h1>欢迎来到scu资源共享站</h1>
    <a href="http://localhost:8080/resources">首页</a>
    <a href="http://localhost:8080/resources/movies.php">电影</a>
    <a href="http://localhost:8080/resources/serial.php">电视剧</a>
    <a href="http://localhost:8080/resources/variety_show.php">综艺</a>
    <a href="http://localhost:8080/resources/books.php">书籍</a>

    <form action="books.php?act=insert" method="post">
        <br>上传者
         <input type="txt" name="name" />
        <br>书籍名称
         <input type="txt" name="bookName" required="required"/>
        <br>链接
         <input type="txt" name="link" />
        <br>提取码
         <input type="txt" name="extractCode" />
        <br>备注
         <input type="txt" name="notes" />
         <input type="submit" value="提交" />
     </form>
     <div id="load">数据加载中……请稍等</div>
     <br>
     <div class="wrap">
              <input type='text' value="" id='searchKey' placeholder="搜索……" style="width: 20%"/>
              <input type='button' value="查询" id='searchBtn' />
              <table border=1px id='searchShow'></table>
     </div>
     <br>
     </center>
</body>
<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
let l = [[],[],[],[],[]];
<?php
    $i=0;
    while($row = mysqli_fetch_array($result)){
        echo "l[0][".$i."]=\"".$row['name']."\";";
        echo "l[1][".$i."]=\"".$row['bookName']."\";";
        echo "l[2][".$i."]=\"".$row['link']."\";";
        echo "l[3][".$i."]=\"".$row['extractCode']."\";";
        echo "l[4][".$i."]=\"".$row['notes']."\";\n";
        $i++;
    }
?>
function Fuzzysearch(l){
    this.l = l,//请求得到的数据
    this.searchKey = document.getElementById('searchKey'),//查询关键字
    this.searchBtn = document.getElementById('searchBtn'),//查询按钮
    this.searchShow = document.getElementById('searchShow')//显示查询结果的表格

    this.renderTab(this.l);
    this.init();
}
Fuzzysearch.prototype={
    init :function(){
        let _this = this;
        //键入触发事件
        _this.searchKey.onkeyup=function(e){
            var e = e || event;
            if(e.keyCode == 13) {
              let searchResult = _this.searchFn();
              _this.renderTab(searchResult);
            }
        };
        //点击查询按钮触发事件
        _this.searchBtn.onclick=function(){
            let searchResult = _this.searchFn();
            _this.renderTab(searchResult);
        };
    },

    searchFn:function(){
        var keyWord = this.searchKey.value;
        location.href="books.php"+"?act=search&keyWord="+keyWord;
    }
    ,renderTab:function(list){
        let colStr = '';

        if(list[1].length==0){
          this.searchShow.innerHTML='未查询到关键字相关结果';
          return;
        }
        colStr+="<tr><th style=\"width:5.2%\">分享者</th><th style=\"width:30%\">书籍名称</th><th style=\"width:30%\">网盘链接</th><th style=\"width:5%\">提取码</th><th style=\"width:26.8%\">备注</th><th style=\"width:3%\">操作</th></tr>";
        for(var i=0,len=list[1].length;i<len;i++){
             colStr+="<tr><td style=\"width:5.2%\">"+list[0][i]+"</td><td style=\"width:30%\">"+list[1][i]+"</td><td style=\"width:30%\" class=\"link\"><a href=\""+list[2][i]+"\">"+list[2][i]+"</a></td><td style=\"width:5%\">"+list[3][i]+"</td><td style=\"width:26.8%\">"+list[4][i]+"</td><td style=\"width:3%\"><input type=\"button\" value=\"删除\" onclick=\"window.location.href='http://localhost:8080/resources/books.php?act=delete&delateObject="+list[1][i]+"'\"></td></tr>";
        }

        this.searchShow.innerHTML = colStr;
    }
}
document.getElementById('load').innerHTML="<p>加载成功</p>";
new Fuzzysearch(l);
</script>
</html>

