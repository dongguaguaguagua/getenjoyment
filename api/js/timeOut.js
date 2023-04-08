// 显示1秒的加载进度条
setTimeout(function() {
    // Get a reference to the loading spinner element
    var spinner = document.getElementById('id_load');
    // Remove the loading spinner from the DOM
    spinner.parentNode.removeChild(spinner);
}, 1000);
