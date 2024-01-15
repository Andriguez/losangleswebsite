function openPopUp(){
    let popup = document.getElementById('box-popup');
    const mainWindow = document.getElementById("page");
    popup.style.display="block";
    mainWindow.style.filter = "blur(5px)";
    mainWindow.style.pointerEvents = "none";
    popup.style.filter="none";
}

function closePopUp(){
    location.reload();
    document.getElementById('box-popup').style.display = "none";
    document.getElementById("page").style.filter = "none";
}

function displayComments(topicName, postId) {
    displayPopUp(`/feed/${topicName}/viewpost/${postId}`)
}

function displayPostText(topicName){
    displayPopUp(`/feed/${topicName}/postbox`)
}

function displayPopUp(filepath) {

    let xhr = new XMLHttpRequest();
    xhr.open('GET', filepath, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('box-content').innerHTML = xhr.responseText;
            openPopUp();
        }
    };
    xhr.send();
}