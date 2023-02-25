//编辑资源
var editItem = function(name) {
    var close = document.getElementsByClassName("close");
    var editForm = document.getElementsByClassName("editForm");
    editForm[0].className = "editForm open";
    close[0].addEventListener('click', function() {
        editForm[0].className = "editForm";
    })
    document.editResources.action = "books.php?act=edit&name=" + name;
}
