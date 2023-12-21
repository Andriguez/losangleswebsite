<!DOCTYPE html>
<head>
    <title>3D Carousel</title>
    <link rel="stylesheet" href="/style/jquery.flipster.min.css">


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery.flipster.min.js"></script>

</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="main-container mt-2">
<div id="gallery">
    <div class="gallery-container">
       <div class="gallery-item gallery-item-1">
           <div class="item-front">
                <img class="picture" src="/media/event1.png" data-index="1">
           </div>
            <div class="item-back text-center">
                <span class="event-name">139 angles</span>

                <span class="event-date">14 Oct</span>
                <img src="/media/triangle-icon.svg">
                <span class="event-location">Kanaal 40</span>
                <span class="subtitle">description</span>
                <span class="event-type">Art exhibition - club night</span>
                <span class="event-description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. </span>
                <span class="subtitle">line-up</span>
                <div class="lineup-container">
                    <div class="type-group">
                <span class="lineup-type">djs</span>
                    <span class="lineup-artist">larasati<img src="/media/triangle-icon.svg"></span>
                    <span class="lineup-artist">NA-AH<img src="/media/triangle-icon.svg"></span>
                    <span class="lineup-artist">Dr. dickey<img src="/media/triangle-icon.svg"></span>
                    <span class="lineup-artist">slimfit b2b ???<img src="/media/triangle-icon.svg"></span>
                    </div>
                    <div class="type-group">
                <span class="lineup-type">exhibits</span>
                        <span class="lineup-artist">Siofra Augusteijn<img src="/media/triangle-icon.svg"></span>
                        <span class="lineup-artist">Zazi Creijghton<img src="/media/triangle-icon.svg"></span>
                        <span class="lineup-artist">Tild Greene<img src="/media/triangle-icon.svg"></span>
                        <span class="lineup-artist">Linus van der Mass<img src="/media/triangle-icon.svg"></span>
                    </div>
                    <div class="type-group">
                        <span class="lineup-type">performers</span>
                        <span class="lineup-artist">Monika Joakim<img src="/media/triangle-icon.svg"></span>
                    </div>
                </div>
                <button type="button" class="tickets-btn" onclick="toggleButton()" href="#">BUY TICKETS</button>
            </div>
        </div>
        <div class="gallery-item gallery-item-2">
            <div class="item-front">
            <img class="picture" src="/media/event2.png" data-index="2">
            </div>
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div>
        <div class="gallery-item gallery-item-3">
            <div class="item-front">
            <img class="picture" src="/media/event3.png" data-index="3">
            </div>
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div>
        <div class="gallery-item gallery-item-4">
            <div class="item-front">
                <img class="picture" src="/media/event4.png" data-index="4">
            </div>
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div> <div class="gallery-item gallery-item-5">
            <div class="item-front">
                <img class="picture" src="/media/event5.png" data-index="5">
            </div>
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div>

        <!--<img class="gallery-item gallery-item-1" src="/media/event1.png" data-index="1">
        <img class="gallery-item gallery-item-2" src="/media/event2.png" data-index="2">
        <img class="gallery-item gallery-item-3" src="/media/event3.png" data-index="3">
        <img class="gallery-item gallery-item-4" src="/media/event4.png" data-index="4">
        <img class="gallery-item gallery-item-5" src="/media/event5.png" data-index="5">
        <img class="gallery-item gallery-item-6" src="/media/event5.png" data-index="6">
-->

    </div>
    <div class="gallery-controls">
        <!--<div class="gallery-controls-previous" id="left"><img src="/media/arrow_left.svg" alt=""></div>
        <div class="gallery-controls-next" id="right"><img src="/media/arrow_right.svg" alt=""></div><-->

    </div>
    <div id="date-filter-container">
        <div id="year-container">
            <a href="#"><span>2023<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>2024<img src="/media/triangle-icon.svg"></span></a>
        </div>
        <div id="month-container">
            <a href="#"><span>jan<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>feb<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>mar<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>apr<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>may<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>jun<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>jul<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>aug<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>sep<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>oct<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>nov<img src="/media/triangle-icon.svg"></span></a>
            <a href="#"><span>dec<img src="/media/triangle-icon.svg"></span></a>
        </div>
    </div>
</div>
</div>
<script>
const galleryContainer = document.querySelector('.gallery-container')
const galleryControlsContainer = document.querySelector('.gallery-controls')
const galleryControls = ['previous', 'next'];
const galleryItems = document.querySelectorAll('.gallery-item')

class Carousel {
    constructor(container, items, controls) {
        this.carouselContainer = container;
        this.carouselItems = [...items]
        this.carouselControls = controls;
        this.back = false;
    }

    updateGallery() {
        this.carouselItems.forEach(el => {
            el.classList.remove('gallery-item-1');
            el.classList.remove('gallery-item-2');
            el.classList.remove('gallery-item-3');
            el.classList.remove('gallery-item-4');
            el.classList.remove('gallery-item-5');

        });

        this.carouselItems.slice(0, 5).forEach((el, i) => {
            el.classList.add(`gallery-item-${i + 1}`);
        });
    }

    setCurrentState(direction) {
        if (direction == 'previous') {
            this.carouselItems.unshift(this.carouselItems.pop())
        } else if (direction == 'next') {
            this.carouselItems.push(this.carouselItems.shift())
        }
        this.updateGallery()
    }

    setControls() {
        this.carouselControls.forEach(control => {
            galleryControlsContainer.appendChild(document.createElement('button')).className = `gallery-controls-${control}`;
            document.querySelector(`.gallery-controls-${control}`).innerText = control;

        });
    }

    useControls() {
        /*this.carouselContainer.addEventListener('click', e => {
            const rect = this.carouselContainer.getBoundingClientRect();
            const clickX = e.clientX - rect.left;

            if (clickX < rect.width / 3) {
                // Clicked on the left side of the carousel
                this.setCurrentState('previous');
            } else if (clickX > (rect.width / 3) * 2){
                // Clicked on the right side of the carousel
                this.setCurrentState('next');
            }
            else{
                this.toggleCard();
             }
        });*/

        this.carouselContainer.addEventListener('click', (e) => {
            const centerIndex = 2;

            const clickedIndex = Array.from(this.carouselItems).indexOf(e.target.closest('.gallery-item'));

            if (clickedIndex < centerIndex) {
                this.setCurrentState('previous');
            }
            else if (clickedIndex > centerIndex) {
                this.setCurrentState('next');
            }
            else {
                this.toggleCard();
            }
        });
    }

    toggleCard(direction) {
        // Toggle between front and back states for the center item
        const centerItem = this.carouselItems[2];
        const front = centerItem.querySelector('.item-front');
        const back = centerItem.querySelector('.item-back');

        if (direction === 'previous'){this.carouselItems[3].classList.remove('back')}
        else if (direction === 'next'){this.carouselItems[1].classList.remove('back')}
        else if (!this.back){
            this.back = true;
            back.style.display = 'block';
            back.style.pointerEvents = 'auto';
            front.style.display = 'none';
            centerItem.classList.add('back');
        } else{
            centerItem.classList.remove('back');
            back.style.display = 'none';
            back.style.pointerEvents = 'none';
            front.style.display = 'block';
            this.back = false;
        }
    }
}
     const carousel = new Carousel(galleryContainer, galleryItems, galleryControls);
    carousel.useControls()
    function toggleButton(){
    const body = document.getElementById('gallery');
    body.style.backgroundColor = 'red';
}
</script>
</body>
</html>
<style>
    #events-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
    body{
        overflow: hidden;
    }
    .main-container{
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    #gallery{
        width: 100%;
        height: 500px;
    }

    .gallery-container{
        align-items: center;
        display: flex;
        height: 400px;
        margin: 0 auto;
        max-width: 1020px;
        position: relative;
        overflow: hidden;
        justify-content: center;
    }

    .gallery-item{
        opacity: 0;
        transition: all 0.3s ease-in-out;
        transform-style: preserve-3d;
        max-width: 350px;
        max-height: 380px;
        z-index: 0;
        border-radius: 0;
        background-size: contain;
        cursor: pointer;
        position: absolute;
        left: 50%;
        border: black 2px solid;
    }

    .gallery-item,
    .item-front,
    .item-back{
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
        transform: translateX(-50%);
        /*backface-visibility: hidden;*/
        color: white;

    }

    .item-back{
        display: none;
        background-color: black;
        position: absolute;
        translate: 50%;
        padding: 10px;

    .event-name{
            font-family: angles;
            text-transform: uppercase;
            font-size: 16px;
            display: block;
            margin-top: 5px;
        }
    .event-date {
        display: inline-block;
        font-family: "Agency FB";
    }
    .event-location{
        display: inline-block;
        font-family: "Agency FB";
    }
    .event-type{
        text-align: right;
        display: block;
        font-weight: lighter;
        font-size: 16px;
        font-family: "Agency FB";
    }
    .event-description{
        display: block;
        text-align: justify;
        margin: auto;
        width: 310px;
        font-size: 18px;
        font-family: "Agency FB";
    }
    .lineup-container{
        display: block;
        text-align: justify;
        margin: auto;
        width: 310px;
        height: 100px;
        overflow-y: scroll;
    }
    .lineup-type{
        text-align: right;
        display: block;
        font-weight: lighter;
        font-size: 18px;
        font-family: "Agency FB";
    }
    .lineup-artist{
        font-family: angles;
        font-size: 9px;
        text-transform: uppercase;
        margin-left: 1px;
        margin-right: 1px;

        img{
            margin:1px;
        }
    }
    .subtitle{
        display: block;
        text-transform: uppercase;
        font-family: angles;
        font-size: 10px;
        margin-top: 14px;
        margin-bottom: 4px;
        text-align: left;
    }
    img{
        width: 10px !important;
        height: 10px !important;
        filter: invert(100%);
    }

    button {
        border-width: 3px;
        font-weight: bold;
        background-color: white;
        font-family: angles;
        font-size: 12px;
        margin-top: 15px;
        margin-bottom: 5px;

    }
    button:hover {
        background-color: black;
        border-color: white;
        color: white;
    }
    }
    .gallery-item.back{

    }
    .item-front{
        display: block;
        translate: 50%;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
    }

    .gallery-item-1{
        left: 15%;
        opacity: 0.2;
        transform: translateX(-50%);
        height: 360px;
    }

    .gallery-item-2, .gallery-item-4{
        height: 380px;
        opacity: 0.5;
        width: 380px;
        z-index: 1;
    }

    .gallery-item-2{
        left: 30%;
        transform: translateX(-50%);
    }
    .gallery-item-3{
        height: 430px;
        opacity: 1;
        left: 50%;
        transform: translateX(-50%);
        width: 430px;
        z-index: 2;
    }

    .gallery-item-4{
        left: 70%;
        transform: translateX(-50%);
    }

    .gallery-item-5{
        left: 85%;
        opacity: .2;
        transform: translateX(-50%);
        height: 360px;
    }
    #date-filter-container{
        text-align: center;
    }
    #year-container{
        font-size: 16px !important;
    }
    #month-container{
        font-size: 14px !important;
    }

    #date-filter-container a{
        text-decoration: none;
        color: black;
        font-family: angles;
    }
    #date-filter-container a:hover{
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
    #date-filter-container img{
        width:10px;
        height: 10px;
    }
    .gallery-controls{
        display: flex;
    }

    .gallery-controls button{
        background-color: transparent;
        border: 0;
        cursor: pointer;
        margin: 0 50px;
        padding 0 12px;
        text-transform: capitalize;
    }

    .gallery-controls-previous{
        position: relative;
    }

    .gallery-controls-previous::before{
        border: solid black;
        border-width: 0 5px 5px 0;
        content: '';
        display: inline-block;
        height: 5px;
        left: -30%;
        padding: 10px;
        position: absolute;
        top: 25%;
        transform: rotate(135deg) translateY(-50%);
        transition: left 0.15s ease-in-out;
        width: 5px;
    }
    .gallery-controls-next{
        position: relative;
    }

    .gallery-controls-next::before{
        border: solid black;
        border-width: 0 5px 5px 0;
        content: '';
        display: inline-block;
        height: 5px;
        right: -30%;
        padding: 10px;
        position: absolute;
        top: 25%;
        transform: rotate(-45deg) translateY(-50%);
        transition: left 0.15s ease-in-out;
        width: 5px;
    }

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
        background-color: silver; /* Color of the thumb on hover */
    }
</style>