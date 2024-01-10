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

function storeData(data, functionName, redirect){

    let hasData = data.has('picture')
    let fetchOptions = { method: 'POST', headers:{ "Content-Type": "application/json"}}

    if(hasData){
        fetchOptions.headers = {};
        fetchOptions.body = data;
    } else{
        fetchOptions.body = JSON.stringify(Object.fromEntries(data));
    }

    fetch(`/admin/${functionName}`, fetchOptions)
        .then(response => response.json())
        .then(data => {
            openWindow(`/admin/${redirect}`);
            alert(data);})
        .catch(error => console.error(error));
}

function selectedIdAction(selectedId, functionName, redirect){
    fetch(`/admin/${functionName}/${selectedId}`, {
        method: 'GET',
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            alert(data);
            openWindow(`/admin/${redirect}`);
        })
        .catch(error => console.error(error));
}

//function editSelectedUser(){
  //  let userRadios = document.querySelectorAll('.userRadio:checked');

    //if (userRadios.length > 0) {
      //  let userId = userRadios[0].id;
        //let filepath = `admin/manageuser/${userId}`;
        //openWindow(filepath);
    //} else {
      //  console.log("No user selected.");
    //}
//}

function selectedRadioAction(functionName, redirect){
    let radios = document.querySelectorAll('.radioBtn:checked');

    if (radios.length > 0) {
        let id = radios[0].id;
        selectedIdAction(id, functionName, redirect)

    } else {
        alert("No id selected.");
    }
}

function displaySelectedUserDetails(selectElement, functionName){
    let userId = selectElement.value;
    let filepath = `admin/${functionName}/${userId}`;

    openWindow(filepath)
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
            let file = fileInput.files[0];

            // Check if the selected file is an image
            if (file.type.startsWith('image/')) {
                // Create a FileReader to read the file
                const reader = new FileReader();

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

//DISCIPLINE

function storeDiscipline(){
    let disciplineName = document.getElementById('inputName').value;
    const data = {"disciplineName": disciplineName}
    const functionName = 'creatediscipline';
    const redirect = 'viewdisciplines';

    storeData(data, functionName, redirect);
}

//ARTIST DETAILS
function storeArtistDetails(){
    let artistId = document.getElementById('inputArtist').value;
    let stageName = document.getElementById('inputstagename').value;
    let discipline = document.getElementById('inputDiscipline').value;
    let location = document.getElementById('inputlocation').value;
    let email = document.getElementById('inputEmail').value;
    let description = document.getElementById('inputdescription').value;
    let socials = document.getElementById('inputsocials').value;
    let soundcloud = document.getElementById('inputsoundcloud').value;
    let extraLink = document.getElementById('inputlink').value;

    let fileInput = document.getElementById('upload-artist-details-picture');
    let file = fileInput.files[0];

    const formData = new FormData();
    formData.append('stageName', stageName);
    formData.append('discipline', discipline);
    formData.append('location', location);
    formData.append('email', email);
    formData.append('description', description);
    formData.append('socials', socials);
    formData.append('soundcloud', soundcloud);
    formData.append('extraLink', extraLink);
    formData.append('picture', file);

    const functionName = `storeartistdetails/${artistId}`;
    const redirect = `manageartistdetails/${artistId}`;

    storeData(formData, functionName, redirect);
}