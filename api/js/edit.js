//编辑资源
document.write('<script src="js/escape.js" type="text/javascript" charset="utf-8"></script>');
var editItem = function(fileName,name,mediaName,link,extractCode,notes) {
    var close = document.getElementsByClassName("close");
    var editForm = document.getElementsByClassName("editForm");
    console.log(mediaName);
    // console.log(unescape(name));
    console.log(unescape(mediaName));
    // console.log(unescape(link));
    // console.log(unescape(extractCode));
    // console.log(unescape(notes));

    //自动填充要编辑的内容
    document.getElementById('id_edit_name').value=unescape(name);
    document.getElementById('id_edit_mediaName').value=unescape(mediaName);
    document.getElementById('id_edit_link').value=unescape(link);
    document.getElementById('id_edit_extractCode').value=unescape(extractCode);
    document.getElementById('id_edit_notes').value=unescape(notes);

    editForm[0].className = "editForm open";
    close[0].addEventListener('click', function() {
        editForm[0].className = "editForm";
    })
    console.log(fileName + ".php?act=edit&name=" + mediaName);
    document.editResources.action = fileName + ".php?act=edit&name=" + mediaName;
}
