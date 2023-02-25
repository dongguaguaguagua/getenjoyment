function Fuzzysearch(l,fileName,name) {
    this.l = l;                                                    //请求得到的数据
    this.fileName = fileName;
    this.name = name;
    this.searchKey = document.getElementById('id_searchKey');      //查询关键字
    this.searchBtn = document.getElementById('id_searchBtn');      //查询按钮
    this.searchShow = document.getElementById('id_searchShow');    //显示查询结果的表格
    this.renderTab(this.l,this.name);
    this.init(this.fileName);
}
Fuzzysearch.prototype = {
    init: function(fileName) {
        let _this = this;
        //键入触发事件
        _this.searchKey.onkeyup = function(e) {
            var e = e || event;
            if (e.keyCode == 13) {
                let searchResult = _this.searchFn(fileName);
                _this.renderTab(searchResult);
            }
        };
        //点击查询按钮触发事件
        _this.searchBtn.onclick = function() {
            let searchResult = _this.searchFn(fileName);
            _this.renderTab(searchResult);
        };
    },
    searchFn: function(fileName) {
        var keyWord = this.searchKey.value;
        location.href = fileName +".php" + "?act=search&keyWord=" + keyWord;
    },
    renderTab: function(list,name) {
        let colStr = '';

        if (list[1].length == 0) {
            this.searchShow.innerHTML = '<center><span class=\"mdl-chip\"><span class=\"mdl-chip__text\">很遗憾，未查询到关键字相关结果</span></span></center>';
            return;
        }
        //表格头mdl
        colStr += "<thead><tr><th style=\"width:5.2%\">分享者</th>\
            <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">"+name+"名称</th>\
            <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">网盘链接</th>\
            <th style=\"width:5%\">提取码</th>\
            <th class=\"mdl-data-table__cell--non-numeric\" style=\"width:26.8%\">备注</th>\
            <th style=\"width:3%\">操作</th>\
            </tr></thead>";
        //表身mdl
        console.log(typeof (list[1][0]));
        colStr += "<tbody>";
        for (var i = 0, len = list[1].length; i < len; i++) {
            colStr += "<tr>\
        <td style=\"width:5.2%\">"+ list[0][i] + "</td>\
        <td class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\">"+ list[1][i] + "</td>\
        <td class=\"mdl-data-table__cell--non-numeric\" style=\"width:30%\" class=\"link\"><a href=\""+ list[2][i] + "\">" + list[2][i] + "</a></td>\
        <td style=\"width:5%\">"+ list[3][i] + "</td><td class=\"mdl-data-table__cell--non-numeric\" style=\"width:26.8%\">" + list[4][i] + "</td>\
        <td style=\"width:3%\">\
        <button id=\"menu-lower-right"+ i.toString() + "\" class=\"mdl-button mdl-js-button mdl-button--icon\">\
          <i class=\"material-icons\">more_vert</i>\
        </button>\
        <ul class=\"mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect\"\
            for=\"menu-lower-right"+ i.toString() + "\">\
            <li class=\"mdl-menu__item\" onclick=\"window.location.href='/resources/books.php?act=delete&delateObject="+ list[1][i] + "'\">删除</li>\
            <li class=\"mdl-menu__item\" onclick=editItem(\""+ list[1][i] + "\");>编辑</li>\
        </ul>\
        </td></tr>";
        }
        colStr += "</tbody>";
        this.searchShow.innerHTML = colStr;
    }
}
// document.getElementById('id_load').innerHTML = "<span class=\"mdl-chip\"><span class=\"mdl-chip__text\">成功加载后10条内容！</span></span>";
