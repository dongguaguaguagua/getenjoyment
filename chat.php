<!DOCTYPE html>
<html>
<?php
require_once 'function.php';
definePages();

?>
<head>
  <meta charset="UTF-8">
  <title>GPT3.5-Turbo</title>
  <!-- material design lite 的主题CSS -->
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-light_blue.min.css">
  <!-- 引入Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- 高亮代码highlight.js的sublime高亮主题 -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/monokai-sublime.min.css">
  <!-- 自定义CSS -->
  <link rel="stylesheet" href="css/hidden.css" />
</head>

<body>
  <!-- Always shows a header, even in smaller screens. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">欢迎使用GPT3.5-Turbo</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
          <a class="mdl-navigation__link" href="<?php echo moviePage;?>">电影</a>
          <a class="mdl-navigation__link" href="<?php echo serialPage;?>">电视剧</a>
          <a class="mdl-navigation__link" href="<?php echo varietyShowPage;?>">综艺</a>
          <a class="mdl-navigation__link" href="<?php echo booksPage;?>">书籍</a>
          <a class="mdl-navigation__link" href="<?php echo gptPage;?>">GPT3.5</a>
        </nav>
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
    </header>
    <div class="mdl-layout__drawer">
      <span class="mdl-layout-title">GPT3.5-Turbo</span>
      <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="<?php echo indexPage;?>">
                <span class="material-icons">home</span>首页
            </a>
            <a class="mdl-navigation__link" href="<?php echo moviePage;?>">
                <span class="material-icons">movie</span>电影
            </a>
            <a class="mdl-navigation__link" href="<?php echo serialPage;?>">
                <span class="material-icons">live_tv</span>电视剧
            </a>
            <a class="mdl-navigation__link" href="<?php echo varietyShowPage;?>">
                <span class="material-icons">sports_martial_arts</span>综艺
            </a>
            <a class="mdl-navigation__link" href="<?php echo booksPage;?>">
                <span class="material-icons">auto_stories</span>书籍
            </a>
            <a class="mdl-navigation__link" href="<?php echo gptPage;?>">
                <span class="material-icons">chat</span>chat
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
      <div id="conversation_container"></div>
      <div id="btnContainer">
        <button onclick="submit()" style="width: 100%;"
          class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
          generate
          <span class="material-icons">done_all</span>
        </button>
      </div>
    </main>
  </div>
</body>
<!-- markdown-it -->
<script src="https://cdn.jsdelivr.net/npm/markdown-it/dist/markdown-it.min.js"></script>
<!-- 引入highlight.js来高亮代码 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
<!-- jQuery框架 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- material design lite -->
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="js/chat.js"></script>

</html>
