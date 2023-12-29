const adminMainWindow = document.getElementById("main-window-content")

function openWindow(filePath) {
    let xhr = new XMLHttpRequest();
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

function selectedUserAction(action, reload){
    let userRadios = document.querySelectorAll('.userRadio:checked');

    if (userRadios.length > 0) {
        let userId = userRadios[0].id;
        let filepath = 'admin/'+action+'/'+userId;

        if(!reload){
            openWindow(filepath);
        }else {
            window.location.replace(filepath);
        }

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
function previewImage(fileInput, imgId) {
    let previewContainer = fileInput.parentElement.parentElement;
    let thumbnailPreview = document.getElementById(imgId);

    fileInput.addEventListener('change', function () {
        // Check if any file is selected
        if (fileInput.files.length > 0) {
            var file = fileInput.files[0];

            // Check if the selected file is an image
            if (file.type.startsWith('image/')) {
                // Create a FileReader to read the file
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Set the thumbnail preview source
                    thumbnailPreview.src = e.target.result;
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);

            } else {
                alert('Please select a valid image file.');
            }
        }
    });
}