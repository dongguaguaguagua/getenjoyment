<?php
require_once 'function.php';
$result=init("localhost","root","","resources","movies","movieName");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SCU资源共享站-电影</title>
</head>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="mdl/material.teal-light_blue.min.css" />
<link rel="stylesheet" href="css/hidden.css" />

<body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">欢迎来到SCU资源共享站</span>
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
            <span class="mdl-layout-title">SCU资源共享站</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="/resources">
                    <span class="material-icons">home</span>首页
                </a>
                <a class="mdl-navigation__link" href="/resources/movies.php">
                    <span class="material-icons">movie</span>电影
                </a>
                <a class="mdl-navigation__link" href="/resources/serial.php">
                    <span class="material-icons">live_tv</span>电视剧
                </a>
                <a class="mdl-navigation__link" href="/resources/variety_show.php">
                    <span class="material-icons">sports_martial_arts</span>综艺
                </a>
                <a class="mdl-navigation__link" href="/resources/books.php">
                    <span class="material-icons">auto_stories</span>书籍
                </a>
                <a class="mdl-navigation__link" href="https://github.com/dongguaguaguagua/getenjoyment">
                    <span class="material-icons">public</span>Github
                </a>
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
                            <span style="color: #429488;padding-right: 20px;"
                                class="material-icons">account_circle</span>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="name" id="id_edit_name">
                                <label class="mdl-textfield__label" for="id_edit_name"></label>
                            </div>
                            <br>
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">movie</span>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="movieName" required="required"
                                    id="id_edit_mediaName">
                                <label class="mdl-textfield__label" for="id_edit_mediaName"></label>
                            </div>
                            <br>
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">add_link</span>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="link"
                                    pattern="^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+" id="id_edit_link">
                                <label class="mdl-textfield__label" for="id_edit_link"></label>
                                <span class="mdl-textfield__error">链接只能包含字母和数字及其他英文符号</span>
                            </div>
                            <br>
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">code</span>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" type="text" name="extractCode"
                                    id="id_edit_extractCode">
                                <label class="mdl-textfield__label" for="id_edit_extractCode"></label>
                            </div>
                            <br>

                            <span style="color: #429488;padding-right: 20px;" class="material-icons">description</span>
                            <div class="mdl-textfield mdl-js-textfield">
                                <textarea class="mdl-textfield__input" type="text" name="notes"
                                    id="id_edit_notes"></textarea>
                                <label class="mdl-textfield__label" for="id_edit_notes"></label>
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
                        <span style="color: #429488;padding-right: 20px;" class="material-icons">account_circle</span>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="name" id="id_name">
                            <label class="mdl-textfield__label" for="id_name">你的名字……</label>
                        </div>
                        <br>
                        <span style="color: #429488;padding-right: 20px;" class="material-icons">movie</span>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="movieName" id="id_mediaName">
                            <label class="mdl-textfield__label" for="id_mediaName">电影名称(必填)</label>
                        </div>
                        <br>
                        <span style="color: #429488;padding-right: 20px;" class="material-icons">add_link</span>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="link"
                                pattern="^((https|http|ftp|rtsp|mms)?:\/\/)[^\s]+" id="id_link1">
                            <label class="mdl-textfield__label" for="id_link1">资源链接(必须是永久链接)</label>
                            <span class="mdl-textfield__error">链接只能包含字母和数字及其他英文符号</span>
                        </div>
                        <br>
                        <span style="color: #429488;padding-right: 20px;" class="material-icons">code</span>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="extractCode" id="id_extractCode1">
                            <label class="mdl-textfield__label" for="id_extractCode1">提取码（如果有的话）</label>
                        </div>
                        <br>
                        <span style="color: #429488;padding-right: 20px;" class="material-icons">description</span>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <textarea class="mdl-textfield__input" type="text" name="notes" id="id_notes"></textarea>
                            <label class="mdl-textfield__label" for="id_notes">备注……</label>
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
                    <!-- MDL Progress Bar with Indeterminate Progress -->
                    <div id="id_load" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
                    <br>
                    <div class="wrap">
                        <!-- 搜索框 -->
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" value="" name="notes" id="id_searchKey"
                                style="width:400px;">
                            <label class="mdl-textfield__label" for="id_searchKey" style="width:400px;">搜索……</label>
                        </div>
                        <!-- 查询按钮 -->
                        <button style="margin-left: 100px;"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"
                            id='id_searchBtn'>
                            <span class="material-icons">search</span>
                        </button>
                        <!-- 绘制表格 -->
                        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" border=1px id='id_searchShow'>
                        </table>
                    </div>
                    <br><br><br><br><br>
                </center>
            </div>
        </main>
    </div>
</body>

<!-- Google mdl风格 -->
<script defer src="mdl/material.min.js"></script>
<!-- 编辑 -->
<script src="js/edit.js"></script>
<!-- 搜索及后面的表格显示 -->
<script src="js/search.js"></script>
<!-- 自动识别提取码 -->
<script src="js/autoLoadLink.js"></script>
<!-- mdl进度条 -->
<script src="js/timeOut.js"></script>

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
    new Fuzzysearch(l, "movies", "电影");
</script>

</html>
