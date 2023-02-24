<?php
require_once 'function.php';
$result=init("localhost","root","","resources","movies","movieName");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>scu资源共享站-电影</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/hidden.css" />
<body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">欢迎来到scu资源共享站</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="/resources/movies.php">电影</a>
                    <a class="mdl-navigation__link" href="/resources/serial.php">电视剧</a>
                    <a class="mdl-navigation__link" href="/resources/variety_show.php">综艺</a>
                    <a class="mdl-navigation__link" href="/resources/books.php">书籍</a>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">scu资源共享站</span>
            <nav class="mdl-navigation">
                <a class="fa fa-user-circle fa-lg mdl-navigation__link" href="/resources">&nbsp;&nbsp;&nbsp;首页</a>
                <a class="fa fa-film fa-lg mdl-navigation__link" href="/resources/movies.php">&nbsp;&nbsp;&nbsp;电影</a>
                <a class="fa fa-video-camera fa-lg mdl-navigation__link"
                    href="/resources/serial.php">&nbsp;&nbsp;&nbsp;电视剧</a>
                <a class="fa fa-hand-peace-o fa-lg mdl-navigation__link"
                    href="/resources/variety_show.php">&nbsp;&nbsp;&nbsp;综艺</a>
                <a class="fa fa-book fa-lg mdl-navigation__link" href="/resources/books.php">&nbsp;&nbsp;&nbsp;书籍</a>
                <a class="fa fa-github fa-lg mdl-navigation__link"
                    href="https://github.com/dongguaguaguagua/getenjoyment">&nbsp;&nbsp;&nbsp;Github</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">
                <center>
                    <h3 style="color:rgb(65, 147, 136)">电影</h3>
                    <!-- 绘制编辑对话框 -->
                    <div class="editForm">
                    <h3 style="color:rgb(65, 147, 136);">编辑资源</h3>
                    <form action="" method="post" name="editResources">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="name" id="name">
                            <label class="mdl-textfield__label" for="name">修改名字</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="movieName" required="required"
                                id="movieName">
                            <label class="mdl-textfield__label" for="movieName">修改电影名称(必填)</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="link" pattern="[A-Z,a-z,0-9,/:.?%&=-]*"
                                id="link">
                            <label class="mdl-textfield__label" for="link">修改资源链接(必须是永久链接)</label>
                            <span class="mdl-textfield__error">链接只能包含字母和数字及其他英文符号</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="extractCode" id="extractCode">
                            <label class="mdl-textfield__label" for="extractCode">修改提取码（如果有的话）</label>
                        </div>
                        <br>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" name="notes" id="notes"></textarea>
                            <label class="mdl-textfield__label" for="notes">修改备注</label>
                        </div>
                        <br>
                        <button
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                            type="submit">
                            提交
                        </button>
                        <br><br><br><br>
                        <div class="close" style="color:rgb(65, 147, 136);">关闭</div>
                    </form>
                    </div>
                    <!-- 表格内容 -->
                    <form action="movies.php?act=insert" method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="name" id="name">
                            <label class="mdl-textfield__label" for="name">你的名字……</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="movieName" required="required"
                                id="movieName">
                            <label class="mdl-textfield__label" for="movieName">电影名称(必填)</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="link" pattern="[A-Z,a-z,0-9,/:.?%&=-]*"
                                id="link">
                            <label class="mdl-textfield__label" for="link">资源链接(必须是永久链接)</label>
                            <span class="mdl-textfield__error">链接只能包含字母和数字及其他英文符号</span>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="extractCode" id="extractCode">
                            <label class="mdl-textfield__label" for="extractCode">提取码（如果有的话）</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" name="notes" id="notes"></textarea>
                            <label class="mdl-textfield__label" for="notes">备注……</label>
                        </div>
                        <br>
                        <button
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                            type="submit">
                            分享资源
                        </button>
                    </form>
                    <br>
                    <!-- <div class="mdl-spinner mdl-js-spinner is-active"></div> -->

                    <!-- 加载中 -->
                    <div id="load"><span class="mdl-chip"><span class="mdl-chip__text">加载中……</span></span></div>
                    <br>
                    <div class="wrap">
                        <!-- 搜索框 -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" value="" name="notes" id="searchKey"
                                style="width:400px;">
                            <label class="mdl-textfield__label" for="searchKey" style="width:400px;">搜索……</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!-- 查询按钮 -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"
                            id='searchBtn'>查询</button>
                        <!-- 绘制表格 -->
                        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" border=1px id='searchShow'>
                        </table>
                    </div>
                    <br><br><br><br><br>
                </center>
            </div>
        </main>
    </div>
</body>
<!-- Google mdl风格 -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="mdl/material.teal-light_blue.min.css" />
<script defer src="mdl/material.min.js"></script>
<script>
    //编辑资源
    var editItem = function(name) {
        var close=document.getElementsByClassName("close");
        var editForm=document.getElementsByClassName("editForm");
        editForm[0].className="editForm open";
        close[0].addEventListener('click',function(){
            editForm[0].className="editForm";
        })
        document.editResources.action="movies.php?act=edit&name="+name;
    }
</script>
<script>
    let l = [[], [], [], [], []];
<?php
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        echo "l[0][".$i."]=\"".$row['name']."\";";
        echo "l[1][".$i."]=\"".$row['movieName']."\";";
        echo "l[2][".$i."]=\"".$row['link']."\";";
        echo "l[3][".$i."]=\"".$row['extractCode']."\";";
        echo "l[4][".$i."]=\"".$row['notes']."\";\n";
        $i++;
    }
?>;
    function Fuzzysearch(l) {
        this.l = l;                                                 //请求得到的数据
        this.searchKey = document.getElementById('searchKey');      //查询关键字
        this.searchBtn = document.getElementById('searchBtn');      //查询按钮
        this.searchShow = document.getElementById('searchShow');    //显示查询结果的表格
        this.renderTab(this.l);
        this.init();
    }
    Fuzzysearch.prototype = {
        init: function() {
            let _this = this;
            //键入触发事件
            _this.searchKey.onkeyup = function(e) {
                var e = e || event;
                if (e.keyCode == 13) {
                    let searchResult = _this.searchFn();
                    _this.renderTab(searchResult);
                }
            };
            //点击查询按钮触发事件
            _this.searchBtn.onclick = function() {
                let searchResult = _this.searchFn();
                _this.renderTab(searchResult);
            };
        },
        searchFn: function() {
            var keyWord = this.searchKey.value;
            location.href = "movies.php" + "?act=search&keyWord=" + keyWord;
        },
        renderTab: function(list) {
            let colStr = '';

            if (list[1].length == 0) {
                this.searchShow.innerHTML = '<center><span class=\"mdl-chip\"><span class=\"mdl-chip__text\">很遗憾，未查询到关键字相关结果</span></span></center>';
                return;
            }
            //表格头mdl
            colStr += "<thead><tr><th style=\"width:5.2%\">分享者</th>\
                <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">电影名称</th>\
                <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">网盘链接</th>\
                <th style=\"width:5%\">提取码</th>\
                <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:26.8%\">备注</th>\
                <th style=\"width:3%\">操作</th>\
                </tr></thead>";
            //表身mdl
            colStr += "<tbody>";
            for (var i = 0, len = list[1].length; i < len; i++) {
                colStr += "<tr>\
            <td style=\"width:5.2%\">"+ list[0][i] + "</td>\
            <td class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">"+ list[1][i] + "</td>\
            <td class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\" class=\"link\"><a href=\""+ list[2][i] + "\">" + list[2][i] + "</a></td>\
            <td style=\"width:5%\">"+ list[3][i] + "</td><td class=\"mdl-data-table__cell--non-numeric\" style=\"width:26.8%\">" + list[4][i] + "</td>\
            <td style=\"width:3%\">\
            <button id=\"menu-lower-right"+i.toString()+"\" class=\"mdl-button mdl-js-button mdl-button--icon\">\
              <i class=\"material-icons\">more_vert</i>\
            </button>\
            <ul class=\"mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect\"\
                for=\"menu-lower-right"+i.toString()+"\">\
                <li class=\"mdl-menu__item\" onclick=\"window.location.href='/resources/movies.php?act=delete&delateObject="+ list[1][i] + "'\">删除</li>\
                <li class=\"mdl-menu__item\" onclick=editItem(\""+list[1][i]+"\");>编辑</li>\
            </ul>\
            </td></tr>";
            }
            colStr += "</tbody>";
            this.searchShow.innerHTML = colStr;
        }
    }
    document.getElementById('load').innerHTML = "<span class=\"mdl-chip\"><span class=\"mdl-chip__text\">加载成功！</span></span>";

    new Fuzzysearch(l);
</script>

</html>
