// 链接:https://pan.baidu.com/s/1PgTU7p0paXeHcFM272t14Q  密码:iqfj
// [两杆大烟枪].Lock.Stock....资源-XH1080.com.mkv
// https://www.aliyundrive.com/s/ZbPkvXKLAEk
// 提取码: c53r
// 点击链接保存，或者复制本段内容，打开「阿里云盘」APP ，无需下载极速在线查看，视频原画倍速播放。
// https://dongmelon.lanzouw.com/iLdwJiv4h4j蓝奏云
function autoLoadFilmNameAndExtractCode(linkInputElement) {
    var linkInputValue = linkInputElement.value;
    var linkElement = linkInputElement.parentElement;
    var codeElement = linkElement.nextElementSibling.nextElementSibling.nextElementSibling;
    console.log(codeElement)
    var linkBegin = linkInputValue.search("http");
    if (linkBegin != -1) {
        var linkEnd = linkBegin;
        while (33 <= linkInputValue.charCodeAt(linkEnd) && linkInputValue.charCodeAt(linkEnd) <= 126) {
            linkEnd++;
        }
        linkElement.MaterialTextfield.change(linkInputValue.substring(linkBegin, linkEnd));
    }
    var codeBegin = linkInputValue.search("码");
    if (codeBegin != -1) {
        while (!(('0' <= linkInputValue.charAt(codeBegin) && linkInputValue.charAt(codeBegin) <= '9') ||
                ('a' <= linkInputValue.charAt(codeBegin) && linkInputValue.charAt(codeBegin) <= 'z') ||
                ('A' <= linkInputValue.charAt(codeBegin) && linkInputValue.charAt(codeBegin) <= 'Z'))) {
            codeBegin++;
        }
        var codeEnd = codeBegin;
        while (('0' <= linkInputValue.charAt(codeEnd) && linkInputValue.charAt(codeEnd) <= '9') ||
                ('a' <= linkInputValue.charAt(codeEnd) && linkInputValue.charAt(codeEnd) <= 'z') ||
                ('A' <= linkInputValue.charAt(codeEnd) && linkInputValue.charAt(codeEnd) <= 'Z')) {
            codeEnd++;
        }
        codeElement.MaterialTextfield.change(linkInputValue.substring(codeBegin, codeEnd));
    }
}
function autoLoadFilmNameAndExtractCode2(codeInputElement) {
    var codeInputValue = codeInputElement.value;
    var codeElement = codeInputElement.parentElement;
    var linkElement = codeElement.previousElementSibling.previousElementSibling.previousElementSibling;
    var linkBegin = codeInputValue.search("http");
    if (linkBegin != -1) {
        var linkEnd = linkBegin;
        while (33 <= codeInputValue.charCodeAt(linkEnd) && codeInputValue.charCodeAt(linkEnd) <= 126) {
            linkEnd++;
        }
        codeElement.MaterialTextfield.change(codeInputValue.substring(linkBegin, linkEnd));
    }
    var codeBegin = codeInputValue.search("码");
    if (codeBegin != -1) {
        while (!(('0' <= codeInputValue.charAt(codeBegin) && codeInputValue.charAt(codeBegin) <= '9') ||
                ('a' <= codeInputValue.charAt(codeBegin) && codeInputValue.charAt(codeBegin) <= 'z') ||
                ('A' <= codeInputValue.charAt(codeBegin) && codeInputValue.charAt(codeBegin) <= 'Z'))) {
            codeBegin++;
        }
        var codeEnd = codeBegin;
        while (('0' <= codeInputValue.charAt(codeEnd) && codeInputValue.charAt(codeEnd) <= '9') ||
                ('a' <= codeInputValue.charAt(codeEnd) && codeInputValue.charAt(codeEnd) <= 'z') ||
                ('A' <= codeInputValue.charAt(codeEnd) && codeInputValue.charAt(codeEnd) <= 'Z')) {
            codeEnd++;
        }
        linkElement.MaterialTextfield.change(codeInputValue.substring(codeBegin, codeEnd));
    }
}
