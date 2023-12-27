const adminMainWindow = document.getElementById("main-window-content")

function openWindow(filePath) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', filePath, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('main-window').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}