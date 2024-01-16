<!DOCTYPE html>
<head>
    <title>dynamic carousel</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="main-container mt-2">
    <div id="gallery">
        <div class="gallery-container">
        </div>
        <div id="date-filter-container">
            <div id="year-container">
                <?php if(isset($yFilters)){ foreach ($yFilters as $index => $year){ ?>
                    <a class="<?php echo ($selectedYear == $year) ? 'selectedFilter': ''?>" href="/events/<?php echo $year ?>"><span><?php echo $year ?>▶</span></a>
                <?php }} ?>
            </div>
            <div id="month-container">
                <?php if(isset($mFilters)){ foreach ($mFilters as $i => $month){ ?>
                    <a class="<?php echo ($selectedMonth == $i) ? 'selectedFilter': ''?>" href="/events/<?php echo $selectedYear.'/'.$i ?>"><span><?php echo $month ?>▶</span></a>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>
<script>
    const galleryContainer = document.querySelector('.gallery-container')
    const galleryItems = document.querySelectorAll('.gallery-item')

    class Carousel {
        constructor(container) {
            this.carouselContainer = container;
            this.carouselItems = new Array(2);
            this.back = false;
        }

        initializeGallery(items) {

            this.carouselItems = items.map((item, index) => {

                let galleryItem = this.createGalleryItem(index, item);
                this.carouselContainer.appendChild(galleryItem);
                return galleryItem;
            });
            this.updateGallery();
        }

        createGalleryItem(index, item) {
            const galleryItem = document.createElement('div');
            galleryItem.classList.add('gallery-item');

            const itemFront = document.createElement('div');
            itemFront.classList.add('item-front');

            const img = document.createElement('img');
            img.classList.add('picture');
            img.src = item.posterSrc;
            img.setAttribute('data-index', index);

            itemFront.appendChild(img);

            galleryItem.appendChild(itemFront);
            let itemBack = this.createItemBack(item);
            galleryItem.appendChild(itemBack);

            return galleryItem;
        }

        createItemBack(item) {
            const itemBack = document.createElement('div');
            itemBack.classList.add('item-back');
            itemBack.classList.add('text-center');

            // Create and append each span with event details
            const eventName = document.createElement('span');
            eventName.classList.add('event-name');
            eventName.textContent = item.event_name;
            itemBack.appendChild(eventName);

            const eventDate = document.createElement('span');
            eventDate.classList.add('event-date');
            let date = new Date(item.event_datetime.date);
            let formattedDate = date.toLocaleDateString('en-US', { day: 'numeric', month: 'long' });
            eventDate.textContent = formattedDate + ' ▶ ';
            itemBack.appendChild(eventDate);

            const eventLocation = document.createElement('span');
            eventLocation.classList.add('event-location');
            eventLocation.textContent = item.event_location.location_name;
            itemBack.appendChild(eventLocation);

            const descriptionSubtitle = document.createElement('span');
            descriptionSubtitle.classList.add('subtitle');
            descriptionSubtitle.textContent = 'description';
            itemBack.appendChild(descriptionSubtitle);

            const eventType = document.createElement('span');
            eventType.classList.add('event-type');
            eventType.textContent = item.event_type.event_type_name;
            itemBack.appendChild(eventType);

            const eventDescription = document.createElement('span');
            eventDescription.classList.add('event-description');
            eventDescription.textContent = item.event_description;
            itemBack.appendChild(eventDescription);



            // Line-up container
            if (item.lineups && item.lineups.length > 0) {
                const lineupSubtitle = document.createElement('span');
                lineupSubtitle.classList.add('subtitle');
                lineupSubtitle.textContent = 'lineup';
                itemBack.appendChild(lineupSubtitle);

                const lineupContainer = document.createElement('div');
                lineupContainer.classList.add('lineup-container');

                item.lineups.forEach(lineup => {
                    const typeGroup = document.createElement('div');
                    typeGroup.classList.add('type-group');

                    const lineupType = document.createElement('span');
                    lineupType.classList.add('lineup-type');
                    lineupType.textContent = lineup.category;
                    typeGroup.appendChild(lineupType);

                    const lineupArtist = document.createElement('span');
                    lineupArtist.classList.add('lineup-artist');
                    lineupArtist.textContent = lineup.artists.join('▶ ') + '▶ ';
                    typeGroup.appendChild(lineupArtist);

                    lineupContainer.appendChild(typeGroup);

                });
                    itemBack.appendChild(lineupContainer);
            }


            // Tickets button
            const ticketsBtn = document.createElement('button');
            ticketsBtn.classList.add('tickets-btn');
            ticketsBtn.textContent = item.event_ticketbtn_text;
            ticketsBtn.onclick = function() { toggleButton(item.event_ticketbtn_url); };
            itemBack.appendChild(ticketsBtn);

            return itemBack;
        }

        updateGallery() {
            const totalItems = this.carouselItems.length;

            // mapping for 4 items case
            const mappingForFourItems = [5, 1, 2, 3];

            this.carouselItems.forEach((el, i) => {
                el.classList.remove(...Array.from({ length: 5 }, (_, j) => `gallery-item-${j + 1}`));

                if (totalItems < 5) {
                    let newIndex;
                    switch (totalItems){
                        case 2:
                            newIndex = (i === 0) ? 2 : 3; // Two items, one to the left of center, one in center
                            break;
                        case 3:
                            newIndex = i + 1; // Three items in order, with last one centered
                            break;
                        case 4:
                            newIndex = mappingForFourItems[i];
                            break;
                        default:
                            newIndex = 3; // Single item, center it
                            break; }
                    el.classList.add(`gallery-item-${newIndex}`);
                } else {
                    // Normal class assignment for 5 or more items
                    let itemIndex = i + 1;
                    el.classList.add(`gallery-item-${itemIndex}`);
                }
            });

        }

        setCurrentState(direction) {
            if (direction === 'previous') {
                this.carouselItems.unshift(this.carouselItems.pop());
            } else if (direction === 'next') {
                this.carouselItems.push(this.carouselItems.shift());
            }
            this.updateGallery();
        }

        useControls() {

            this.carouselContainer.addEventListener('click', (e) => {
                const centerIndex = Math.floor(this.carouselItems.length / 2);


                    const clickedIndex = Array.from(this.carouselItems).indexOf(e.target.closest('.gallery-item'));

                    if (clickedIndex < centerIndex) {
                        this.setCurrentState('previous');
                    } else if (clickedIndex > centerIndex) {
                        this.setCurrentState('next');
                    } else if (clickedIndex === centerIndex){
                        const clickedItem = e.target.closest('.gallery-item');
                        if (clickedItem) {
                            this.toggleCard(clickedItem);
                        }
                    }

            });
        }

        toggleCard(clickedItem) {
            const front = clickedItem.querySelector('.item-front');
            const back = clickedItem.querySelector('.item-back');

            if (!front || !back) {
                return;
            }

            if (front.style.display !== 'none') {
                front.style.display = 'none';
                back.style.display = 'block';
                back.style.pointerEvents = 'auto';
                clickedItem.classList.add('back');
            } else {
                const allItems = document.querySelectorAll('.gallery-item');

                allItems.forEach(item => {
                    const itemBack = item.querySelector('.item-back');
                    const itemFront = item.querySelector('.item-front');

                    if (itemBack && itemFront) {
                        itemBack.style.display = 'none';
                        itemBack.style.pointerEvents = 'none';
                        itemFront.style.display = 'block';
                        item.classList.remove('back');
                    }
                });
            }
        }
    }
    const carousel = new Carousel(galleryContainer);
    const eventsData = <?php echo isset($events) ? json_encode($events) : ''?>;
    carousel.initializeGallery(eventsData);
    carousel.useControls();

    function toggleButton(url){
        window.location.href = url;
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
    .selectedFilter{
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