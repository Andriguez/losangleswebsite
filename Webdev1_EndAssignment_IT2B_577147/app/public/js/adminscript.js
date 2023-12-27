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
function editSelectedUser(){
    let userRadios = document.querySelectorAll('.userRadio:checked');

    if (userRadios.length > 0) {
        let userId = userRadios[0].id;
        let filepath = 'admin/manageuser/'+userId;
        openWindow(filepath);
    } else {
        console.log("No user selected.");
    }
}

function togglePassword(){
    const passwordInput = document.getElementById('inputPassword');
    const button = document.getElementById('togglePasswordbtn');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        button.textContent = 'Hide';
    } else {
        passwordInput.type = 'password';
        button.textContent = 'Show';
    }
}