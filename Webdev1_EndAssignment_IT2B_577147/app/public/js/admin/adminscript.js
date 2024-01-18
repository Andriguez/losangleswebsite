const adminMainWindow = document.getElementById("main-window-content")

function openWindow(functionName) {
    const filePath = `/admin/${functionName}`
    let xhr = new XMLHttpRequest();
    xhr.open('GET', filePath, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('main-window').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

function storeData(data, functionName, redirect) {

    let isFormData = data instanceof FormData;
    let fetchOptions = {method: 'POST', headers: {"Content-Type": "application/json"}}

    if (isFormData) {
        fetchOptions.headers = {};
        fetchOptions.body = data;
    } else {
        fetchOptions.body = JSON.stringify(Object.fromEntries(Object.entries(data)));
    }

    fetch(`/admin/${functionName}`, fetchOptions)
        .then(response => response.json())
        .then(data => {
            openWindow(redirect);
            alert(data);
        })
        .catch(error => console.error(error));
}

function selectedIdAction(selectedId, functionName, redirect) {
    fetch(`/admin/${functionName}/${selectedId}`, {
        method: 'GET',
        headers: {
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            alert(data);
            openWindow(redirect);
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

function selectedRadioBtnAction(functionName, redirect) {
    let radios = document.querySelectorAll('.radioBtn:checked');

    if (radios.length > 0) {
        let id = radios[0].id;
        selectedIdAction(id, functionName, redirect)

    } else {
        alert("No radio button has been selected.");
    }
}

function selectedRadioBtnOpenWindow(functionName) {
    let radios = document.querySelectorAll('.radioBtn:checked');

    if (radios.length > 0) {
        let id = radios[0].id;
        let redirect = `${functionName}/${id}`
        openWindow(redirect)

    } else {
        alert("No radio button has been selected.");
    }
}

function displaySelectIdAction(selectElement, functionName) {
    let selectedId = selectElement.value;
    let filepath = `${functionName}/${selectedId}`;

    openWindow(filepath)
}

function togglePassword() {
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

function storeDiscipline() {
    let disciplineName = document.getElementById('inputName').value;
    const data = {"disciplineName": disciplineName}
    const functionName = 'creatediscipline';
    const redirect = 'viewdisciplines';

    storeData(data, functionName, redirect);
}

//ARTIST DETAILS
function storeArtistDetails() {
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

//ABOUT DETAILS

function storeAboutDetails() {
    let title = document.getElementById('inputtitle').value;
    let titleLink = document.getElementById('inputtitlelink').value;
    let description = document.getElementById('inputdescription').value;
    let footer = document.getElementById('inputfooter').value;
    let footerLink = document.getElementById('inputfooterlink').value;

    const data = {
        "title-text": title,
        "title-link": titleLink,
        "about-description": description,
        "footer-text": footer,
        "footer-link": footerLink
    }
    const functionName = 'updateaboutcontent';
    const redirect = 'managedescription';

    storeData(data, functionName, redirect);
}

//ADMIN DETAILS

function storeAdminDetails() {
    let adminId = document.getElementById('inputAdmin').value;
    let nameLink = document.getElementById('inputlink').value;
    let titles = document.getElementById('inputtitles').value;
    let description = document.getElementById('inputdescription').value;

    let fileInput = document.getElementById('admin-picture');
    let file = fileInput.files[0];

    const formData = new FormData();
    formData.append('link', nameLink);
    formData.append('titles', titles);
    formData.append('description', description);
    formData.append('picture', file);

    const functionName = `storeadmincontent/${adminId}`;
    const redirect = `manageadmindetails/${adminId}`;

    storeData(formData, functionName, redirect);
}

//USER INFO
function storeUserInfo(userId) {
    let email = document.getElementById('inputEmail').value;
    let password = document.getElementById('inputPassword').value;
    let pronouns = document.getElementById('inputpronouns').value;
    let firstname = document.getElementById('inputfirstname').value;
    let lastname = document.getElementById('inputlastname').value;
    let usertype = document.getElementById('inputType').value;

    let fileInput = document.getElementById('user-profile-picture');
    let file = fileInput.files[0];

    const formData = new FormData();
    formData.append('firstname', firstname);
    formData.append('lastname', lastname);
    formData.append('email', email);
    formData.append('usertype', usertype);
    formData.append('pronouns', pronouns);
    formData.append('password', password);
    formData.append('picture', file);

    const functionName = 'storeUser/' + userId;
    const redirect = `viewusers`;

    storeData(formData, functionName, redirect);
}

//EVENT TYPE
function storeEventType() {
    let typeName = document.getElementById('inputEventTypeName').value;
    const data = {"eventTypeName": typeName}
    const functionName = 'createeventtype';
    const redirect = 'vieweventtypes';

    storeData(data, functionName, redirect);
}

//EVENT LOCATION

function storeEventLocation() {
    let name = document.getElementById('inputName').value;
    let address = document.getElementById('inputAddress').value;
    let city = document.getElementById('inputCity').value;
    let country = document.getElementById('inputCountry').value;
    let mapurl = document.getElementById('inputUrl').value;

    const data = {"name": name, "address": address, "city": city, "country": country, "mapurl": mapurl}
    const functionName = 'storelocation';
    const redirect = 'viewlocations';

    storeData(data, functionName, redirect);
}

//EVENTS

function storeEvent(eventId) {
    let name = document.getElementById('inputName').value;
    let type = document.getElementById('inputType').value;
    let datetime = document.getElementById('inputDatetime').value;
    let location = document.getElementById('inputLocation').value;
    let description = document.getElementById('inputDescription').value;
    let btnText = document.getElementById('inputBtnTxt').value;
    let btnLink = document.getElementById('inputBtnLink').value;

    let fileInput = document.getElementById('upload-event-picture');
    let file = fileInput.files[0];

    const formData = new FormData();
    formData.append('name', name);
    formData.append('type', type);
    formData.append('datetime', datetime);
    formData.append('location', location);
    formData.append('description', description);
    formData.append('btnText', btnText);
    formData.append('btnLink', btnLink);
    formData.append('picture', file);

    const functionName = 'storeEvent/' + eventId;
    const redirect = `viewEvents`;

    storeData(formData, functionName, redirect);
}

//EVENT LINE UP

function storeEventLineUp() {
    let event = document.getElementById('inputEvent').value;
    let category = document.getElementById('inputCategory').value;
    let artists = document.getElementById('inputArtist').value;

    const data = {"event": event, "category": category, "artists": artists}
    const functionName = 'storelineup';
    const redirect = 'viewlineups';

    storeData(data, functionName, redirect);
}

//FEED TOPIC

    function storeFeedTopic(){
    let topicName = document.getElementById('inputTopicName').value;
    const data = {"feedTopicName": topicName}
    const functionName = 'createFeedTopic';
    const redirect = 'viewtopics';

    storeData(data, functionName, redirect);
}

//APPLICATIONS

function storeApplication(){
    let name = document.getElementById('inputName').value;
    let stagename = document.getElementById('inputStageName').value;
    let email = document.getElementById('inputEmail').value;
    let location = document.getElementById('inputLocation').value;
    let pronouns = document.getElementById('inputpronouns').value;
    let gender = document.getElementById('inputGender').value;
    let discipline = document.getElementById('inputDiscipline').value;
    let message = document.getElementById('inputMessage').value;
    let socials = document.getElementById('inputSocials').value;

    const data = {"name": name, "stagename": stagename, "email": email, "location": location, "pronouns": pronouns, "gender": gender, "discipline": discipline, "message": message, "socials": socials}
    const functionName = 'storeapplication';
    const redirect = 'viewapplications';

    storeData(data, functionName, redirect);
}

function createUserFromApplication(){
    let email = document.getElementById('inputEmail').value;
    let password = document.getElementById('inputPassword').value;
    let pronouns = document.getElementById('inputpronouns').value;
    let firstname = document.getElementById('inputfirstname').value;
    let lastname = document.getElementById('inputlastname').value;
    let stagename = document.getElementById('inputstagename').value;
    let usertype = document.getElementById('inputType').value;
    let discipline = document.getElementById('inputDiscipline').value;
    let location = document.getElementById('inputlocation').value;
    let description = document.getElementById('inputdescription').value;
    let socials = document.getElementById('inputsocials').value;

    let fileInput = document.getElementById('upload-artist-picture');
    let file = fileInput.files[0];

    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);
    formData.append('pronouns', pronouns);
    formData.append('firstname', firstname);
    formData.append('description', description);
    formData.append('lastname', lastname);
    formData.append('stagename', stagename);
    formData.append('usertype', usertype);
    formData.append('discipline', discipline);
    formData.append('location', location);
    formData.append('picture', file);
    formData.append('socials', socials);


    const functionName = 'createuserfromapplication';
    const redirect = `viewapplications`;

    storeData(formData, functionName, redirect);
}

function selectAll(maincheckbox){
    const itemCheckboxes = document.querySelectorAll('.aa-checkbox');

    if(itemCheckboxes.length > 0){
        itemCheckboxes.forEach(checkbox => { checkbox.checked = maincheckbox.checked; });
    }
}
function selectedCheckAction(functionName, redirect, allowmultiple) {
    let checkboxes = document.querySelectorAll('.aa-checkbox:checked');

    if (checkboxes.length > 0 && !allowmultiple) {
        let id = checkboxes[0].id;
        selectedIdAction(id, functionName, redirect)

    }else if(checkboxes.length >= 1){

        if (allowmultiple){
            let data = [];
            checkboxes.forEach(checkbox => {
                let id = checkbox.id;
                data.push(id);
            });
            let JSONdata = JSON.stringify(data)
            multipleSelectionAction(JSONdata, functionName, redirect);

        } else { alert("only one checkbox is allowed to be selected.") }

    } else { alert("No checkbox(s) has been selected."); }
}
function multipleSelectionAction(data, functionName, redirect){
    fetch(`/admin/${functionName}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: data
    })
        .then(response => response.json() )
        .then(data => {
            if(functionName === 'downloadArtistApplications'){
                downloadJSONdata(data);
                openWindow(redirect);
            } else{
                alert(data.message);
                openWindow(redirect);} })
        .catch((error) => console.error('Error:', error));
}
function downloadJSONdata(data){
    const blob = new Blob([JSON.stringify(data.data)],
        { type: 'application/json' });
    const a = document.createElement('a');
    a.href = window.URL.createObjectURL(blob);
    a.download = 'applications.json';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}
function selectedCheckOpenWindow(functionName) {
    let checkboxes = document.querySelectorAll('.aa-checkbox:checked');

    if (checkboxes.length > 0 && checkboxes.length === 1) {
        let id = checkboxes[0].id;
        let redirect = `${functionName}/${id}`
        openWindow(redirect)

    } else if (checkboxes.length > 2){ alert("more than one checkbox has been selected."); }

    else { alert("No checkbox has been selected."); }
}
