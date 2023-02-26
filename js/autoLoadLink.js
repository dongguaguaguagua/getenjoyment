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
