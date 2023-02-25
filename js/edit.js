//编辑资源
var editItem = function(name,mediaName,link,extractCode,notes) {
    var close = document.getElementsByClassName("close");
    var editForm = document.getElementsByClassName("editForm");
    console.log(name);
    console.log(mediaName);
    console.log(link);
    console.log(extractCode);
    console.log(notes);
    //自动填充要编辑的内容
    document.getElementById('id_edit_name').value=name;
    document.getElementById('id_edit_mediaName').value=mediaName;
    document.getElementById('id_edit_link').value=link;
    document.getElementById('id_edit_extractCode').value=extractCode;
    document.getElementById('id_edit_notes').value=notes;

    editForm[0].className = "editForm open";
    close[0].addEventListener('click', function() {
        editForm[0].className = "editForm";
    })
    document.editResources.action = "books.php?act=edit&name=" + mediaName;
}
