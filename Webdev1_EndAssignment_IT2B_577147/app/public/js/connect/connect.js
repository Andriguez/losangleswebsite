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

window.onload = function() {
    const page = document.getElementById('page')
    const sectionName = page.getAttribute('data-section-name')
    loadPosts(sectionName, 1);
};
function loadPosts(sectionName, pageNumber){
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/feed/${sectionName}/displayposts?pagenr=${pageNumber}`, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('all-posts-container').innerHTML = xhr.responseText;
        }
    };
    xhr.send();

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

function storeComment(postId, topicName, inputId){
    const inputComment = document.getElementById(inputId).value;
    const data = {"inputComment": inputComment}
console.log(inputId)
    fetch(`/feed/${topicName}/comment/${postId}`, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
        }, body: JSON.stringify(data)})
        .then(response => displayComments(topicName, postId))
        .catch(error => console.error(error));


}