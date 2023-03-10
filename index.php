<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SCU资源共享站</title>
</head>

<!-- sytle sheet -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="mdl/material.teal-light_blue.min.css" />
<link rel="stylesheet" href="css/hidden.css" />

<body>
    <!-- Always shows a header, even in smaller screens. -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">欢迎来到SCU资源共享站</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- 没有用的search button等你完善-->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                                  mdl-textfield--floating-label mdl-textfield--align-right">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
                    </div>
                </div>
            </div>
            <!-- Tabs -->
            <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                <a href="#fixed-tab-books" class="mdl-layout__tab is-active">书籍</a>
                <a href="#fixed-tab-movies" class="mdl-layout__tab">电影</a>
                <a href="#fixed-tab-serial" class="mdl-layout__tab">电视剧</a>
                <a href="#fixed-tab-variety-show" class="mdl-layout__tab">综艺</a>
                <a class="mdl-navigation__link" href="/resources/chat.html">GPT3.5</a>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">SCU资源共享站</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="index_test.html">
                    <span class="material-icons">home</span>首页
                </a>
                <a class="mdl-navigation__link" href="movies.php">
                    <span class="material-icons">movie</span>电影
                </a>
                <a class="mdl-navigation__link" href="serial.php">
                    <span class="material-icons">live_tv</span>电视剧
                </a>
                <a class="mdl-navigation__link" href="variety_show.php">
                    <span class="material-icons">sports_martial_arts</span>综艺
                </a>
                <a class="mdl-navigation__link" href="books.php">
                    <span class="material-icons">auto_stories</span>书籍
                </a>
                <a class="mdl-navigation__link" href="https://github.com/dongguaguaguagua/getenjoyment">
                    <!-- 20-(24-17)=13 -->
                    <svg viewBox="0 0 24 24" width="17" height="17" style="font-size: small;padding-right: 19px;">
                        <path fill="#878787"
                            d="M12,0.4c-6.6,0-12,5.4-12,12c0,5.3,3.4,9.8,8.1,11.4c0.6,0.1,0.8-0.3,0.8-0.6c0-0.3,0-1,0-2c-3.3,0.7-4-1.6-4-1.6c-0.5-1.3-1.3-1.6-1.3-1.6c-1.1-0.7,0.1-0.7,0.1-0.7c1.2,0.1,1.9,1.2,1.9,1.2c1.1,1.9,2.8,1.3,3.5,1c0.1-0.8,0.4-1.3,0.8-1.6c-2.9-0.3-6-1.4-6-6c0-1.3,0.5-2.3,1.2-3.1c-0.1-0.3-0.5-1.5,0.1-3c0,0,1-0.3,3.2,1.2c0.9-0.3,1.9-0.5,2.9-0.5s2,0.2,2.9,0.5c2.1-1.5,3.2-1.2,3.2-1.2c0.6,1.5,0.2,2.7,0.1,3c0.8,0.8,1.2,1.8,1.2,3.1c0,4.6-3.1,5.7-6,6c0.5,0.4,0.9,1.1,0.9,2.3c0,1.7,0,3,0,3c0,0.3,0.2,0.7,0.8,0.6c4.7-1.6,8.1-6.1,8.1-11.4C24,5.8,18.6,0.4,12,0.4z" />
                    </svg>Github
                </a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="fixed-tab-books">
                <div class="page-content">
                    <center>
                        <h3 style="color:rgb(65, 147, 136)">书籍</h3>
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
                                <span style="color: #429488;padding-right: 20px;" class="material-icons">auto_stories</span>
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" name="bookName" id="id_edit_mediaName">
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
                        <form action="books.php?act=insert" method="post">
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">account_circle</span>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="name" id="id_name">
                                <label class="mdl-textfield__label" for="id_name">你的名字……</label>
                            </div>
                            <br>
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">auto_stories</span>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="bookName" required="required"
                                    id="id_mediaName">
                                <label class="mdl-textfield__label" for="id_mediaName">书籍名称(必填)</label>
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
                    </center>
                </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-movies">
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
                                <input class="mdl-textfield__input" type="text" name="movieName" id="id_mediaName" required="required">
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
                    </center>
                </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-serial">
                <div class="page-content">
                    <center>
                        <h3 style="color:rgb(65, 147, 136)">电视剧</h3>
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
                                <span style="color: #429488;padding-right: 20px;" class="material-icons">live_tv</span>
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" name="serialName"
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
                        <form action="serial.php?act=insert" method="post">
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">account_circle</span>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="name" id="id_name">
                                <label class="mdl-textfield__label" for="id_name">你的名字……</label>
                            </div>
                            <br>
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">live_tv</span>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="serialName" required="required"
                                    id="id_mediaName">
                                <label class="mdl-textfield__label" for="id_mediaName">电视剧名称(必填)</label>
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
                    </center>
                </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-variety-show">
                <div class="page-content">
                    <center>
                        <h3 style="color:rgb(65, 147, 136)">综艺</h3>
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
                                <span style="color: #429488;padding-right: 20px;" class="material-icons">sports_martial_arts</span>
                                <div class="mdl-textfield mdl-js-textfield">
                                    <input class="mdl-textfield__input" type="text" name="showName" id="id_edit_mediaName">
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

                        <form action="variety_show.php?act=insert" method="post">
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">account_circle</span>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="name" id="id_name">
                                <label class="mdl-textfield__label" for="id_name">你的名字……</label>
                            </div>
                            <br>
                            <span style="color: #429488;padding-right: 20px;" class="material-icons">sports_martial_arts</span>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="showName" required="required"
                                    id="id_showName">
                                <label class="mdl-textfield__label" for="id_showName">综艺名称(必填)</label>
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
                    </center>
                </div>
            </section>
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
function overAllsearch(){
    this.searchKey = document.getElementById('fixed-header-drawer-exp');
    this.searchKey.onkeyup = function(e) {
        var e = e || event;
        if (e.keyCode == 13) {
            let keyWord = this.searchKey.value;
            location.href = "index.php" + "?act=overAllSearch&keyWord=" + keyWord;
        }
    };
}
</script>
</html>
