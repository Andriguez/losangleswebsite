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
<div class="gallery">
    <div class="gallery-container">

       <div class="gallery-item gallery-item-1">
                <img class="picture" src="/media/event1.png" data-index="1">
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div>
        <div class="gallery-item gallery-item-2">
            <img class="picture" src="/media/event2.png" data-index="2">
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div> <div class="gallery-item gallery-item-3">
            <img class="picture" src="/media/event3.png" data-index="3">
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div> <div class="gallery-item gallery-item-4">
            <img class="picture" src="/media/event4.png" data-index="4">
            <div class="item-back text-center">
                <h6 class="mx-3">this is a all the information about the event</h6>
            </div>
        </div> <div class="gallery-item gallery-item-5">
            <img class="picture" src="/media/event5.png" data-index="5">
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
        this.carouselContainer.addEventListener('click', e => {
            const rect = this.carouselContainer.getBoundingClientRect();
            const clickX = e.clientX - rect.left;

            if (clickX < rect.width / 3) {
                // Clicked on the left side of the carousel
                this.setCurrentState('previous');
            } else if (clickX > (rect.width / 3) * 2){
                // Clicked on the right side of the carousel
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

        if (direction == 'previous'){this.carouselItems[3].classList.remove('back')}
        else if (direction == 'next'){this.carouselItems[1].classList.remove('back')}
        else {centerItem.classList.toggle('back');}
    }
}
     const carousel = new Carousel(galleryContainer, galleryItems, galleryControls);
    carousel.useControls()

</script>
</body>
</html>
<style>
    body{
        overflow: hidden;
    }
    .main-container{
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .gallery{
        width: 100%;
        height: 500px;
    }

    .gallery-container{
        align-items: center;
        display: flex;
        height: 450px;
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
        width: 330px;
        z-index: 0;
        border-radius: 0;
        background-size: contain;
        cursor: pointer;
        border: black solid 5px;
    }

    .gallery-item,
    .item-back{
        position: absolute;
        top: 0;
        left: 50%;
        width: 100%;
        height: 100%;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: black;
        color: white;
    }

    .item-back{

    }
    .gallery-item.back{
        transform: rotateY(180deg);

    }

    .gallery-item img {
        width: 100%;
        height: 100%;
    }

    .gallery-item-1{
        left: 15%;
        opacity: 0.4;
        transform: translateX(-50%);
        height: 360px;
    }

    .gallery-item-2, .gallery-item-4{
        height: 380px;
        opacity: 0.8;
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
        opacity: .4;
        transform: translateX(-50%);
        height: 360px;
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

</style>