function openForm(formId){
    let popup = document.getElementById(formId);
    const mainWindow = document.getElementById("page");
    popup.style.display="block";
    mainWindow.style.filter = "blur(5px)";
    mainWindow.style.pointerEvents = "none";
    popup.style.filter="none";
}

function closeForm(formId){
    location.reload();
    document.getElementById(formId).style.display = "none";
    document.getElementById("page").style.filter = "none";
}
