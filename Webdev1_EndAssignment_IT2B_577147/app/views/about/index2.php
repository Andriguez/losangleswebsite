<html>
<head>
    <title>about us</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="album px-4 py-5">
        <div class="row about-row">
            <div class="col about-col">
                <div class="text-container">
                    <a id="title-link" href="<?php echo $this->getContentByElementId('title-link')?>"><span id="title-text" class="title"><?php echo $this->getContentByElementId('title-text')?></span></a>
                    <span id="about-description" class="description"><?php echo $this->getContentByElementId('about-description')?></span>
                    <a id="footer-link" href="<?php echo $this->getContentByElementId('footer-link')?>"><span id="footer-text"><?php echo $this->getContentByElementId('footer-text')?></span></a>
                </div>
            </div>
        </div>
        <div class="row about-row">
            <div class="col about-col">
                <div class="name-container">
                    <a class="name-link" href="#" data-image-src="/media/artist1.png"><span class="title">Maria Walhout</span></a>
                    <img alt="angle" id="angle-1">
                    <label>she/her▶artist/researcher</label>
                </div>
                <div class="description-container">
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam.</span>
                </div>
            </div>

            <div class="col about-col">
                <div class="name-container">
                    <a class="name-link" href="#" data-image-src="/media/place-holder-angle.png"><span class="title">Alma YoungWoman</span></a>
                    <img alt="angle" id="angle-2">
                </div>
                <div class="description-container">
                    <label>she/her▶artist/researcher</label>
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam.</span>
                </div>
            </div>

            <div class="col about-col">
                <div class="name-container">
                    <a class="name-link" href="<?php echo $admin->getAdminContent()->getNameLink();?>" data-image-src="<?php echo $admin->getAdminContent()->getPictureSrc();?>"><span class="title"><?php echo $admin->getFullName();?></span></a>
                    <img alt="angle" id="angle-3">
                    <label><?php echo $admin->getPronouns()?>▶<?php echo $admin->getAdminContent()->getTitles()?></label>
                </div>
                <div class="description-container">
                    <span class="description"><?php echo $admin->getAdminContent()->getDescription();?></span>
                </div>
                </div>
            </div>
        </div>
<script>
    const nameLinks = document.querySelectorAll('.name-link');

    nameLinks.forEach((link) => {
        link.addEventListener('mousemove', (e) => {
            const image = link.nextElementSibling;
            image.src = link.getAttribute('data-image-src');

            const mouseX = e.clientX;
            const mouseY = e.clientY;

            image.style.display = 'block';

            image.style.left = mouseX + 'px';
            image.style.top = mouseY + 'px';

        });

        link.addEventListener('mouseout', (e) => {
            const image = link.nextElementSibling;

            image.style.display = 'none';
        });
    });

    /*document.addEventListener('DOMContentLoaded', function () {
        const link = document.querySelector('.name-link');
        const hoveredImage = document.getElementById('angle-1');

        link.addEventListener('mousemove', function (event) {
            const mouseX = event.clientX;
            const mouseY = event.clientY;

            hoveredImage.style.display = 'block';

            // Set image position based on the cursor
            hoveredImage.style.left = mouseX + 'px';
            hoveredImage.style.top = mouseY + 'px';
            //hoveredImage.style.transform = `translate(${mouseX}px, ${mouseY}px)`;

            // Display the image
        });

        link.addEventListener('mouseout', function () {
            // Hide the image on mouseout
            hoveredImage.style.display = 'none';
        });
    });*/
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

    .about-row{
        margin-top: 7px;
        margin-bottom: 40px;
    }
    .about-col{
        margin: auto;
        text-align: center;
        .name-container{
            label{
        font-weight: bold;
        font-family: "Agency FB";
                font-size: 18px;
    }
        }
        a{
            text-decoration: none;
            color: black;
        }

        .name-link{
            position: relative;
            z-index: 0;
        }
        a:hover{
            z-index: 2;
            color: white !important;
            text-shadow:
                    -1px -1px 0 black,
                    1px -1px 0 black,
                    -1px 1px 0 black,
                    1px 1px 0 black;
        }
        .name-link:hover img{
            display: block;
            transform: translate(10px, 10px);
        }
        img{
            display: none;
            position: absolute;
            max-width: 200px;
            max-height: 200px;
            pointer-events: none;
            transition: transform 0.3s ease-in-out;
            z-index: 1;
            border: black solid 3px;
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
            max-width: 333px;
            margin: auto;
            font-family: "Agency FB";
            font-size: 20px;
    label{
        font-weight: bold;
        font-family: "Agency FB";
    }

        }
        .text-container{
            max-width: 800px;
            margin: auto;
            font-family: "Agency FB";
            font-size: 20px;
            font-weight: bold;

        }  }

    body{
        overflow: hidden;
    }
</style>