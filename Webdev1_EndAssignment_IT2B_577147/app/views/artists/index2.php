<html>
<head>
    <title>artists</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="dropdown mt-1 mb-2 ms-5">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="filerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        discipline
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else</a></li>
    </ul>
</div>
<div class="album pt-1 pb-3">
    <div class="artists-container">
        <label class="type-label">djs</label>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Smother<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>younggwoman<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Diora<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a id="zobayda" class="artist-name" href="#" onclick="showArtistDetails()"><span>Zobayda<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Andy Rodriguez<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>hi.asl<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>angelboy<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div><div class="col">
                <a class="artist-name" href="#"><span>angelboy<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div>
        </div>
    </div>

    <div class="artists-container">
        <label class="type-label">performers</label>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Smother<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>younggwoman<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Diora<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Zobayda<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Andy Rodriguez<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>hi.asl<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>angelboy<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div><div class="col">
                <a class="artist-name" href="#"><span>angelboy<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Kenza Badi<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Amir<img src="/media/triangle-icon.svg"></span></a>
            </div>
            <div class="col">
                <a class="artist-name" href="#"><span>Ada M. Patterson<img src="/media/triangle-icon.svg"></span></a>
            </div>
        </div></div>
</div>
<script>
    function replaceClass(element){
        if (element.classList.contains('artist-details')){
            element.classList.replace('artist-details', 'artist-details.show');
            element.parentElement.style.color = 'white';
            element.style.backgroundColor = 'black';
            let artistName = document.getElementById('zobayda');
            artistName.parentElement.style.backgroundColor = 'black';
            artistName.style.color = 'white';
        } else{
            element.classList.replace('artist-details.show', 'artist-details');
            element.parentElement.style.color = 'black';
            element.parentElement.style.backgroundColor = 'white';
            let artistName = document.getElementById('zobayda');
            artistName.style.color = 'black';
            artistName.parentElement.style.backgroundColor = 'white';
        }
    }
    function showArtistDetails(){
        let artistDetail = document.getElementById('zobayda-details');
        replaceClass(artistDetail);
    }

    function addZobaydaDetails() {
        // Create the zobayda-details div
        let zobaydaDetails = document.createElement('div');
        zobaydaDetails.classList.add('artist-details');

        // Create the img-container div
        let imgContainer = document.createElement('div');
        imgContainer.classList.add('img-container');

        // Create the img element
        let img = document.createElement('img');
        img.src = "/media/artist1.png";
        img.alt = "Artist Image";

        // Create the label element
        let label = document.createElement('label');
        label.textContent = "some labels/pronouns/artistic tags idk";

        // Append img and label to img-container
        imgContainer.appendChild(img);
        imgContainer.appendChild(label);

        // Create the text-container div
        let textContainer = document.createElement('div');
        textContainer.classList.add('text-container');

        // Create the p element
        let paragraph = document.createElement('p');
        paragraph.textContent = "Scelerisque in dictum non consectetur erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur erat nam. Quis varius quam quisque id.";

        // Append paragraph to text-container
        textContainer.appendChild(paragraph);

        // Create the soundcloud-container div
        let soundcloudContainer = document.createElement('div');
        soundcloudContainer.classList.add('soundcloud-container');

        // Create the iframe element
        let iframe = document.createElement('iframe');
        iframe.width = "400px";
        iframe.height = "166";
        iframe.scrolling = "no";
        iframe.frameBorder = "no";
        iframe.allow = "autoplay";
        iframe.src = "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1642138038&color=%230c402a&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true";

        // Create the div for additional styling
        let additionalStyleDiv = document.createElement('div');
        additionalStyleDiv.style.cssText = "font-size: 10px; color: #cccccc; line-break: anywhere; word-break: normal; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; font-family: Interstate, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Garuda, Verdana, Tahoma, sans-serif; font-weight: 100;";

        // Create the links inside the div
        let link1 = document.createElement('a');
        link1.href = "https://soundcloud.com/admiredarkness";
        link1.title = "ADMIRE DARKNESS";
        link1.target = "_blank";
        link1.style.cssText = "color: #cccccc; text-decoration: none;";
        link1.textContent = "ADMIRE DARKNESS";

        let link2 = document.createElement('a');
        link2.href = "https://soundcloud.com/admiredarkness/bunt-voila-techno1";
        link2.title = "BUNT. - Voila (TECHNO)";
        link2.target = "_blank";
        link2.style.cssText = "color: #cccccc; text-decoration: none;";
        link2.textContent = "BUNT. - Voila (TECHNO)";

        // Append links to additionalStyleDiv
        additionalStyleDiv.appendChild(link1);
        additionalStyleDiv.appendChild(document.createTextNode(" · "));
        additionalStyleDiv.appendChild(link2);

        // Append iframe and additionalStyleDiv to soundcloud-container
        soundcloudContainer.appendChild(iframe);
        soundcloudContainer.appendChild(additionalStyleDiv);

        // Append img-container, text-container, and soundcloud-container to zobayda-details
        zobaydaDetails.appendChild(imgContainer);
        zobaydaDetails.appendChild(textContainer);
        zobaydaDetails.appendChild(soundcloudContainer);

        // Append zobayda-details to the container
        document.getElementById('container').appendChild(zobaydaDetails);
    }
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
    .dropdown-menu{
        border-width: 3px !important;
        border-radius: 0 !important;
        border-color: black !important;
        font-family: angles ;
        font-size: 10px;

    }
    .dropdown-item:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
    }
    button{
        border-radius: 0 !important;
        border-color: black !important;
        border-width: 4px !important;
        background-color: white !important;
        color: black !important;
        font-family: angles !important;
        font-size: 15px !important;
    }
    button:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
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

    .text-container{
        max-width: 300px;
    }
    .artist-details img{
        width: 100%
        height: 100%
    }
    .artists-container .row{
        padding: 3px;
        margin-top: 5px;
        margin-bottom: 2px;
    }
    .artist-details{
       display: none;
    }
    .artist-details.show{
        background-color: black !important;
        color: white !important;
        width: 100%;
        box-sizing: border-box;

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
        background-color: silver; /* Color of the track */
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #0056b3; /* Color of the thumb on hover */
    }
</style>