<html>
<head>
    <title>Los Angles</title>
    <link rel="icon" href="/media/logos/onlytb.png" type="image/png">
</head>
<body>
    <div id="page" class="container px-0">
        <!--<img id="homepagePicture" class="logoHomepage" src="" alt="Logo">-->
        <footer>design + code by: Andy Rodriguez©</footer>
    </div>
</body>
</html>
<style>
    @font-face {
        font-family: 'angles';
        src: url('/style/fonts/losangles-font.ttf');
    }
    body{
        overflow: hidden;
    }
    #page{
        background-image: url('<?php echo $homepagePicture->getPictureSrc() ?? ''?>');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        background-color: white;
        z-index: -1;

        width: 100%;
        height: 85%;
    }
</style>

