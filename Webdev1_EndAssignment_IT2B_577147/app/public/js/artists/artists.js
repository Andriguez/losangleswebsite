let isMerged = true;
let div1 = document.createElement('div');
div1.id = 'firstHalf';
let div2 = document.createElement('div');
div2.id = 'secondHalf';
let lastClickedElementId = null;

function toggleDiv(clickedElementId){
    //let targetDiv = document.getElementById(targetDivId);
    let element = document.getElementById(clickedElementId)

    if(isMerged){
        let targetDiv = element.parentElement;
        splitDivFromElement(targetDiv, element, div1, div2);
        isMerged = false
    } else if (!isMerged || clickedElementId !== lastClickedElementId) {
        changeNamesBackgroundColor('white');
        let parentDiv = document.getElementById(lastClickedElementId).parentElement;
        let mergedDiv = mergeDivs(div1, div2);
        parentDiv.innerHTML = '';
        parentDiv.parentNode.appendChild(mergedDiv)
        div2.remove();
        document.getElementById('artistDetails').remove();
        div1.remove();
        isMerged = true;
    }

    lastClickedElementId = clickedElementId;
}

function changeNamesBackgroundColor(color){
    let elements = document.getElementsByClassName('col');

    for (let i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor = color;
    }
}

function splitDivFromElement(targetDiv, clickedElement, div1, div2) {
    let artistName = clickedElement.innerText.replace(/ /g, "-");
    let disciplineName = clickedElement.parentElement.parentElement.getAttribute('data-discipline-name').replace(/ /g, "-");

    div1.classList.add('row', 'row-cols-1', 'row-cols-sm-2', 'row-cols-md-3', 'g-4');
    div2.classList.add('row', 'row-cols-1', 'row-cols-sm-2', 'row-cols-md-3', 'g-4');

    let isAfterSplitElement = false;
    let fragment1 = document.createDocumentFragment();
    let fragment2 = document.createDocumentFragment();

    // Move the children of the target div to the new divs
    while (targetDiv.firstChild) {
        let child = targetDiv.firstChild;

        // Check if the current child is the split element
        if (child === clickedElement) {
            fragment1.appendChild(clickedElement);
            isAfterSplitElement = true;
        }

        // Move the children to the new divs based on the split condition
        if (isAfterSplitElement && child !== clickedElement) {
            fragment2.appendChild(child);
        } else {
            fragment1.appendChild(child);
        }
    }

    let artistDetails = document.createElement('div');
    artistDetails.id = 'artistDetails';

    displayArtistDetails(`/artists/${disciplineName}/${artistName}`);

    targetDiv.replaceWith(div1, artistDetails, div2);
    div1.appendChild(fragment1);
    div2.appendChild(fragment2);

    clickedElement.style.backgroundColor = 'black';
    clickedElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function displayArtistDetails(filePath) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', filePath, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('artistDetails').innerHTML = xhr.responseText;
        }
    };
    xhr.send();

    //fetch(filePath)
    //.then(response => response.json())
    //.then(data => {
    // document.getElementById('artistDetails').innerHTML = data;
    //})
    //.catch(error => {
    //console.error('Error fetching artist details:', error);
    //});
}

function mergeDivs(div1, div2){
    let combinedDiv = document.createElement('div');
    combinedDiv.classList.add('row', 'row-cols-1', 'row-cols-sm-2', 'row-cols-md-3', 'g-4');
    combinedDiv.id = 'target-row';

    while (div1.firstChild) {
        let child = div1.firstChild;
        let clonedChild = child.cloneNode(true);
        combinedDiv.appendChild(clonedChild);
        div1.removeChild(child);
    }

    while (div2.firstChild) {
        let child = div2.firstChild;
        let clonedChild = child.cloneNode(true);
        combinedDiv.appendChild(clonedChild);
        div2.removeChild(child);
    }

    return combinedDiv;
}

document.addEventListener('DOMContentLoaded', function() {
    const disciplineFilter = document.getElementById('disciplineFilter');
    const disciplineParam = disciplineFilter.getAttribute('data-discipline-param');

    if (disciplineParam) {
        // Identify the corresponding category element
        const disciplineDiv = document.getElementById(disciplineParam);

        if (disciplineDiv) {
            // Scroll to the identified category
            disciplineDiv.scrollIntoView({ behavior: 'smooth', block: 'start'});
        }
    }
});

document.getElementById('disciplineFilter').onchange = function() {
    let selectedOption = this.value;
    window.location.href = '/artists/' + selectedOption.replace(/ /g, "-");
};