<html>
<head>
    <title>about us</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="album px-4 py-5">
        <div class="row">
            <div class="col">
                <div class="text-container">
                    <a href="https://www.instagram.com/losanglescollective/"><span class="title">Meet Los Angles</span></a>
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="/media/artist1.png" alt="angle" id="angle-1">
                <div class="name-container">
                    <a href="#"><span class="title">Maria Walhout</span></a>
                </div>
                <div class="description-container">
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</span>
                </div>
            </div>

            <div class="col">
                <div class="name-container">
                    <a href="#"><span class="title">Alma YoungWoman</span></a>
                </div>
                <div class="description-container">
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</span>
                </div>
            </div>

            <div class="col">
                <div class="name-container">
                    <a class="name-link" href="#"><span class="title">Val Dechev</span></a>
                </div>
                <div class="description-container">
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</span>
                </div>
                </div>
            </div>
        </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const link = document.querySelector('.name-link');
        const hoveredImage = document.getElementById('angle-1');

        link.addEventListener('mouseover', function (event) {
            const mouseX = event.clientX;
            const mouseY = event.clientY;

            // Set image position based on the cursor
            //hoveredImage.style.left = mouseX + 'px';
            //hoveredImage.style.top = mouseY + 'px';
            hoveredImage.style.transform = `translate(${mouseX}px, ${mouseY}px)`;

            // Display the image
            hoveredImage.style.display = 'block';
        });

        link.addEventListener('mouseout', function () {
            // Hide the image on mouseout
            hoveredImage.style.display = 'none';
        });
    });
</script>
</body>
</html>
<style>
    #about-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }

    .row{
        margin-top: 10px;
        margin-bottom: 45px;
    }
    .col{
        margin: auto;
        text-align: center;

        a{
            text-decoration: none;
            color: black;
        }

        a:hover{
            color: white !important;
            text-shadow:
                    -1px -1px 0 black,
                    1px -1px 0 black,
                    -1px 1px 0 black,
                    1px 1px 0 black;
        }
        img{
            display: none;
            position: absolute;
            max-width: 200px;
            max-height: 200px;
            pointer-events: none;
            transition: transform 0.3s ease-in-out;
        }
        .title{
            font-family: angles;
            text-transform: uppercase;
            display: block;
            font-size: 18px!important;
            margin-bottom: 8px;
        }

        .description-container{
            text-align: justify;
            padding: 10px;
        }
        .text-container{
            max-width: 800px;
            margin: auto;
        }
    }

    body{
        overflow: hidden;
    }
</style>