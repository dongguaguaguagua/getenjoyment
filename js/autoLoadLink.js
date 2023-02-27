// 链接:https://pan.baidu.com/s/1PgTU7p0paXeHcFM272t14Q  密码:iqfj
// [两杆大烟枪].Lock.Stock....资源-XH1080.com.mkv
// https://www.aliyundrive.com/s/ZbPkvXKLAEk
// 提取码: c53r
// 点击链接保存，或者复制本段内容，打开「阿里云盘」APP ，无需下载极速在线查看，视频原画倍速播放。
// https://dongmelon.lanzouw.com/iLdwJiv4h4j蓝奏云
id_link1.onkeyup = function autoLoadFilmNameAndExtractCode() {
    var m = document.getElementById("id_link1").value;
    var linkBegin = m.search("http");
    if (linkBegin != -1) {
        var linkEnd = linkBegin;
        while (33 <= m.charCodeAt(linkEnd) && m.charCodeAt(linkEnd) <= 126) {
            linkEnd++;
        }
        var linkInput = document.getElementById("id_link1");
        linkInput.parentElement.MaterialTextfield.change(m.substring(linkBegin, linkEnd));
    }
    var codeBegin = m.search("码");
    if (codeBegin != -1) {
        while (!(('0' <= m.charAt(codeBegin) && m.charAt(codeBegin) <= '9') ||
                ('a' <= m.charAt(codeBegin) && m.charAt(codeBegin) <= 'z') ||
                ('A' <= m.charAt(codeBegin) && m.charAt(codeBegin) <= 'Z'))) {
            codeBegin++;
            // console.log("codebegin:", codeBegin);
        }
        // console.log(m.charAt(codeBegin));
        var codeEnd = codeBegin;
        while (('0' <= m.charAt(codeEnd) && m.charAt(codeEnd) <= '9') ||
                ('a' <= m.charAt(codeEnd) && m.charAt(codeEnd) <= 'z') ||
                ('A' <= m.charAt(codeEnd) && m.charAt(codeEnd) <= 'Z')) {
            codeEnd++;
            // console.log("codeEnd:", codeEnd);
        }
        // console.log(m.charAt(codeEnd));
        var extractCodeInput = document.getElementById("id_extractCode1");
        extractCodeInput.parentElement.MaterialTextfield.change(m.substring(codeBegin, codeEnd));
    }
}
id_extractCode1.onkeyup = function autoLoadFilmNameAndExtractCode2() {
    var m = document.getElementById("id_extractCode1").value;
    var linkBegin = m.search("http");
    if (linkBegin != -1) {
        var linkEnd = linkBegin;
        while (33 <= m.charCodeAt(linkEnd) && m.charCodeAt(linkEnd) <= 126) {
            linkEnd++;
        }
        var linkInput = document.getElementById("id_link1");
        linkInput.parentElement.MaterialTextfield.change(m.substring(linkBegin, linkEnd));
    }
    var codeBegin = m.search("码");
    if (codeBegin != -1) {
        while (!(('0' <= m.charAt(codeBegin) && m.charAt(codeBegin) <= '9') ||
                ('a' <= m.charAt(codeBegin) && m.charAt(codeBegin) <= 'z') ||
                ('A' <= m.charAt(codeBegin) && m.charAt(codeBegin) <= 'Z'))) {
            codeBegin++;
            // console.log("codebegin:", codeBegin);
        }
        // console.log(m.charAt(codeBegin));
        var codeEnd = codeBegin;
        while (('0' <= m.charAt(codeEnd) && m.charAt(codeEnd) <= '9') ||
                ('a' <= m.charAt(codeEnd) && m.charAt(codeEnd) <= 'z') ||
                ('A' <= m.charAt(codeEnd) && m.charAt(codeEnd) <= 'Z')) {
            codeEnd++;
            // console.log("codeEnd:", codeEnd);
        }
        // console.log(m.charAt(codeEnd));
        var extractCodeInput = document.getElementById("id_extractCode1");
        extractCodeInput.parentElement.MaterialTextfield.change(m.substring(codeBegin, codeEnd));
    }
}
