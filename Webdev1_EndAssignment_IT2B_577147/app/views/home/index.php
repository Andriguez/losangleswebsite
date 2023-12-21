<?php
?>
<html>
<head>
    <title>Los Angles</title>
</head>
<body>
<?php include_once __DIR__.'/../navbar.php';?>
    <div id="page" class="container px-0">
        <img class="logoHomepage" src="/media/triangle-big-crop1.png" alt="Logo" width="930" height="450">
</div>
</body>
</html>
<style>
    @font-face {
        font-family: 'angles';
        src: url('/style/losangles-font.ttf');
    }
    body{
        background-color: white;
        }
    .logoHomepage {
        position: absolute;
        left: 147px;
    }
    @media (max-width: 1200px) {
        .nav-link {
            margin-left:  auto !important;
            margin-right: auto !important;
        }
        }
    @media (max-width: 768.24px) {
        .nav-link {
            /**nav bar for mobile**/
        }
    }
</style>