<html>
<head>
    <title>artists</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
</head>
<body>
<?php include_once __DIR__.'/../navbar.php'?>
<div class="mt-1 mb-2 ms-5">
    <select id="disciplineFilter" class="form-select">
        <option selected>discipline</option>
        <?php foreach ($disciplines as $discipline){ ?>
            <option value="<?php echo $discipline->getName();?>"><?php echo $discipline->getName();?></option>
        <?php }?>
    </select>
</div>
<div class="album pt-1 pb-3">
    <div id="djs" class="artists-container">
        <label class="type-label">djs</label>
        <div id="target-row" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div id="artist-1" class="col">
                <a  class="artist-name" href="#"><span>Kenza Badi</span></a>
            </div>
            <div id="artist-2" class="col">
                <a class="artist-name" href="#"><span>Amir</span></a>
            </div>
            <div id="artist-3" class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson</span></a>
            </div>
            <div id="artist-4" class="col">
                <a  class="artist-name" href="#"><span>Smother</span></a>
            </div>
            <div id="artist-5" class="col">
                <a  class="artist-name" href="#"><span>younggwoman</span></a>
            </div>
            <div id="artist-6" class="col">
                <a class="artist-name" href="#"><span>Diora</span></a>
            </div>
            <div id="zobayda" class="col">
                <a class="artist-name" href="#" onclick="toggleDiv('zobayda')"><span>Zobayda</span></a>
            </div>
            <div id="artist-8" class="col">
                <a class="artist-name" href="#"><span>Andy Rodriguez</span></a>
            </div>
            <div id="artist-9" class="col">
                <a class="artist-name" href="#"><span>hi.asl<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-101" class="col">
                <a class="artist-name" href="#"><span>angelboy<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-12" class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-13" class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-14" class="col">
                <a class="artist-name" href="#" onclick="toggleDiv('artist-14')"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-15" class="col">
                <a class="artist-name" href="#"><span>angelboy<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-16" class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-17" class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div id="artist-18" class="col">
                <a  class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div>
        </div>
    </div>

    <div id="performers" class="artists-container">
        <label class="type-label">performers</label>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Smother▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>younggwoman▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Diora▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Zobayda▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Andy Rodriguez▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>hi.asl▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>angelboy▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson▶</span></a>
            </div><div class="col">
                <a class="artist-name" href="#"><span>angelboy▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir▶</span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson▶</span></a>
            </div>
        </div></div>

    <?php foreach ($disciplines as $discipline){ ?>
    <div id="<?php echo $discipline->getDisciplineId()?>" class="artists-container">
        <label class="type-label"><?php echo $discipline->getName()?>s</label>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php foreach ($allArtists[$discipline->getDisciplineId()] as $artist) { ?>
                <div id="<?php echo $artist->getUserId?>" class="col">
                    <a class="artist-name" href="#"><span><?php echo $artist->getArtistContent()->getStageName(); ?></span></a>
                </div>
            <?php } ?>
        </div></div>
    <?php } ?>

</div>
<script>
    let isMerged = true;
    let div1 = document.createElement('div');
    let div2 = document.createElement('div');

    function toggleDiv(clickedElementId){
        //let targetDiv = document.getElementById(targetDivId);
        let element = document.getElementById(clickedElementId)

        if(isMerged){
            let targetDiv1 = element.parentElement;
            splitDivFromElement(targetDiv1.id, element.id, div1, div2);
            isMerged = false
        } else {
            element.style.backgroundColor = 'white';
            let parentDiv = element.parentElement.parentElement;
            let mergedDiv = mergeDivs(div1, div2);
            parentDiv.innerHTML = '<label class="type-label">djs</label>';
            parentDiv.appendChild(mergedDiv)
            isMerged = true;
        }
    }


    function splitDivFromElement(targetDivId, clickedElementId, div1, div2) {
        // Get the target div and the split element
        let targetDiv = document.getElementById(targetDivId);
        let clickedElement = document.getElementById(clickedElementId);

        div1.classList.add('row', 'row-cols-1', 'row-cols-sm-2', 'row-cols-md-3', 'g-4');
        div2.classList.add('row', 'row-cols-1', 'row-cols-sm-2', 'row-cols-md-3', 'g-4');


        let isAfterSplitElement = false;

        // Move the children of the target div to the new divs
        while (targetDiv.firstChild) {
            let child = targetDiv.firstChild;

            // Check if the current child is the split element
            if (child === clickedElement) {
                div1.appendChild(clickedElement);
                isAfterSplitElement = true;
            }

            // Move the children to the new divs based on the split condition
            if (isAfterSplitElement && child !== clickedElement) {
                div2.appendChild(child);
            } else {
                div1.appendChild(child);
            }
        }

        let artistDetails = document.createElement('div');
        artistDetails.id = 'artistDetails';
        artistDetails.classList.add('artist-details');

        displayArtistDetails('/artists/dj/zobayda');

        // Insert the new divs after the original target div
        targetDiv.parentNode.insertBefore(div1, targetDiv);
        clickedElement.style.backgroundColor = 'black';
        targetDiv.parentNode.insertBefore(artistDetails, targetDiv.nextSibling);
        targetDiv.parentNode.insertBefore(div2, targetDiv.nextSibling.nextSibling);

        // Remove the original target div
        targetDiv.parentNode.removeChild(targetDiv);
        artistDetails.scrollIntoView({behavior: 'smooth', block: "center"});
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

    function displayArtistDetails(filePath) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', filePath, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('artistDetails').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Read the category parameter from PHP
        const disciplineParam = '<?php echo (isset($targetDiscipline)) ? $targetDiscipline->getDisciplineId() : ''; ?>';

        if (disciplineParam) {
            // Identify the corresponding category element
            const disciplineDiv = document.getElementById(disciplineParam);

            if (disciplineDiv) {
                // Scroll to the identified category
                disciplineDiv.scrollIntoView({ behavior: 'smooth', block: "center"});
            }
        }
    });

    document.getElementById('disciplineFilter').onchange = function() {
        // Get the selected option value
        let selectedOption = this.value;

        // Update the window location to the desired URL
        window.location.href = '/artists/' + selectedOption.replace(/ /g, "-");
    };
</script>
</body>
</html>
<style>
    #artist-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
    .artists-container{
        margin: 35px 60px 120px 60px !important;
        justify-content: center;
        align-items: center;
        align-content: center;
    }
    .type-label{
        font-size: 30px;
        font-weight: lighter;
        color: dimgrey;
        margin-bottom: 10px;
    }
    option{
        border-width: 3px !important;
        border-radius: 0 !important;
        border-color: black !important;
        font-family: angles ;
        font-size: 10px;
        padding: 5px;

    }
    option:hover {
       filter: invert(100);
    }
    select{
        border-radius: 0 !important;
        border-color: black !important;
        border-width: 4px !important;
        background-color: white !important;
        color: black !important;
        font-family: angles !important;
        font-size: 12px !important;
        width: 200px !important;
        text-transform: uppercase;
    }
    select:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
        cursor: pointer;
    }
    .artist-name{
        color: black;
        font-weight: bold;
        font-size: 20px;
        font-family: angles;
        text-transform: uppercase;
    }
    span img{
        height: .8rem;
        width: .8rem;
    }

    .artist-name:hover{
        color: white !important;
        text-shadow:
                -1px -1px 0 black,
                1px -1px 0 black,
                -1px 1px 0 black,
                1px 1px 0 black;
    }

    .album a{
        text-decoration: none;
    }
    .artists-container .col{
        width: auto;
        margin-top: 7px;
    }

    .artist-details{

        width: 100% !important;
        background-color: black !important;
        color: white !important;
        display: flex;
        height: 280px;

        img{
            height: 250px !important;
            width: 250px !important;
        }
        .artist-name{
            margin-top: ;
            display: block;
        }

        .img-container{
            margin: auto;
        }
        .text-container{
            max-width: 420px;
            height: 80%;
            margin: auto;
            padding: 5px;
            justify-content: center;
            overflow-y: auto;
            font-family: "Agency FB";



        span{
                color: white;
                margin-bottom: 2px;
            }
            p{
                margin: 25px 30px 12px 5px;
                font-size: 20px;
            }
        }

        .media-container {
        margin: auto auto 10px auto;
    .icon-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;

    img {
        width: 55px !important;
        height: 55px !important;
        margin: 20px;
        border-radius: 30%;
    }

    img:hover{
        background-color: black;
        filter: invert(100%);
    }

    .soundcloud-container{
        margin-right: 10px;
        margin-top: 50px !important;
    }
    }  }
    }
    .artists-container .row{
        padding: 3px;
        margin-top: 5px;
        margin-bottom: 2px;
    }
    body{
        overflow: hidden;
    }
    .album{
        margin: auto;
        max-height: 390px;
        overflow-y: scroll;
    }
    /* For WebKit browsers (Chrome, Safari) */
    ::-webkit-scrollbar {
        width: 5px; /* Set width of the scrollbar */
    }

    ::-webkit-scrollbar-thumb {
        background-color: black; /* Color of the thumb */
        border-radius: 3px; /* Rounded corners of the thumb */
    }

    ::-webkit-scrollbar-track {
        background-color: white; /* Color of the track */
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: whitesmoke; /* Color of the thumb on hover */
    }
</style>