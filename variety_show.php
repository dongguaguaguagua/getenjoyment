<?php
require_once 'function.php';
$result=init("localhost","root","","resources","variety_show","showName");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>scu资源共享站-综艺</title>
</head>
<style>

/*table#searchShow{
    width : 1424px;
    table-layout : fixed;
}

td.link{
    width:100px;
    word-break:keep-all;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}*/

</style>


<body>
    <center>
    <h2>欢迎来到scu资源共享站</h2>

    <a href="http://localhost:8080/resources">首页</a>
    <a href="http://localhost:8080/resources/movies.php">电影</a>
    <a href="http://localhost:8080/resources/serial.php">电视剧</a>
    <a href="http://localhost:8080/resources/variety_show.php">综艺</a>
    <a href="http://localhost:8080/resources/books.php">书籍</a>

    <form action="books.php?act=insert" method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" name="name" id="name">
             <label class="mdl-textfield__label" for="name">你的名字……</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" name="bookName" required="required" id="bookName">
             <label class="mdl-textfield__label" for="bookName">综艺名称(必填)</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" name="link" pattern="[A-Z,a-z,0-9]*" id="link">
             <label class="mdl-textfield__label" for="link">资源链接(必须是永久链接)</label>
             <span class="mdl-textfield__error">链接只能包含字母和数字</span>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" name="extractCode" id="extractCode">
             <label class="mdl-textfield__label" for="extractCode">提取码（如果有的话）</label>
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" name="notes" id="notes" >
             <label class="mdl-textfield__label" for="notes">备注……</label>
        </div>
        <br>
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit">
            分享资源
        </button>
     </form>
     <br>
     <!-- <div class="mdl-spinner mdl-js-spinner is-active"></div> -->
     <div id="load"><span class="mdl-chip"><span class="mdl-chip__text">加载中……</span></span></div>
     <br>

    <div class="wrap">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
         <input class="mdl-textfield__input" type="text" value="" name="notes" id="searchKey">
         <label class="mdl-textfield__label" for="searchKey">搜索……</label>
    </div>
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id='searchBtn'>查询</button>
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" border=1px id='searchShow'></table>
    </div>
    <br>
    </center>
</body>

<!-- Google mdl风格 -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
<link rel="stylesheet" href="mdl/material.teal-light_blue.min.css" />
<script defer src="mdl/material.min.js"></script>

<script>
let l = [[],[],[],[],[]];
<?php
    $i=0;
    while($row = mysqli_fetch_array($result)){
        echo "l[0][".$i."]=\"".$row['name']."\";";
        echo "l[1][".$i."]=\"".$row['showName']."\";";
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
          this.searchShow.innerHTML='<center><span class=\"mdl-chip\"><span class=\"mdl-chip__text\">很遗憾，未查询到关键字相关结果</span></span></center>';
          return;
        }
        //表格头mdl
        colStr+="<thead><tr><th style=\"width:5.2%\">分享者</th>\
                <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">综艺名称</th>\
                <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">网盘链接</th>\
                <th style=\"width:5%\">提取码</th>\
                <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:26.8%\">备注</th>\
                <th style=\"width:3%\">操作</th>\
                </tr></thead>";
        //表身mdl
        colStr+="<tbody>";
        for(var i=0,len=list[1].length;i<len;i++){
             colStr+="<tr>\
             <td style=\"width:5.2%\">"+list[0][i]+"</td>\
             <td class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">"+list[1][i]+"</td>\
             <td class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\" class=\"link\"><a href=\""+list[2][i]+"\">"+list[2][i]+"</a></td>\
             <td style=\"width:5%\">"+list[3][i]+"</td><td class=\"mdl-data-table__cell--non-numeric\" style=\"width:26.8%\">"+list[4][i]+"</td>\
             <td style=\"width:3%\"><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" onclick=\"window.location.href='http://localhost:8080/resources/books.php?act=delete&delateObject="+list[1][i]+"'\">删除</button></td>\
             </tr>";
        }
        colStr+="</tbody>";
        this.searchShow.innerHTML = colStr;
    }
}
document.getElementById('load').innerHTML="<span class=\"mdl-chip\"><span class=\"mdl-chip__text\">加载成功！</span></span>";
new Fuzzysearch(l);
</script>
</html>

