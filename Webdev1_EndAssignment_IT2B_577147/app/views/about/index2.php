<!DOCTYPE html>
<head>
    <title>about us</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/about/about.css">
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="album px-4 py-5">
        <div class="row about-row">
            <div class="col about-col">
                <div class="text-container">
                    <a id="title-link" href="<?php echo (isset($aboutContent)) ? $aboutContent['title-link']->getText() : '#'?>"><span id="title-text" class="title"><?php echo (isset($aboutContent)) ? $aboutContent['title-text']->getText() : ''?></span></a>
                    <span id="about-description" class="description"><?php echo (isset($aboutContent)) ? $aboutContent['about-description']->getText() : ''?></span>
                    <a id="footer-link" href="<?php echo (isset($aboutContent)) ? $aboutContent['footer-link']->getText() : '#'?>"><span id="footer-text"><?php echo (isset($aboutContent)) ? $aboutContent['footer-text']->getText() : ''?></span></a>
                </div>
            </div>
        </div>
        <div class="row about-row">
            <div class="col about-col">
                <div class="name-container">
                    <a class="name-link" href="#" data-image-src="/media/artist1.png"><span class="title">Maria Walhout</span></a>
                    <img alt="angle" id="angle-1">
                    <label>she/her | artist/researcher</label>
                </div>
                <div class="description-container">
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam.</span>
                </div>
            </div>

            <div class="col about-col">
                <div class="name-container">
                    <a class="name-link" href="#" data-image-src="/media/place-holder-angle.png"><span class="title">Alma YoungWoman</span></a>
                    <img alt="angle" id="angle-2">
                    <label>she/her | artist/researcher</label>
                </div>
                <div class="description-container">
                    <span class="description">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam.</span>
                </div>
            </div>

            <div class="col about-col">
                <div class="name-container">
                    <a class="name-link" href="<?php echo $admin->getAdminContent()->getNameLink();?>" data-image-src="<?php echo $admin->getAdminContent()->getPictureSrc();?>"><span class="title"><?php echo $admin->getFullName();?></span></a>
                    <img alt="angle" id="angle-3">
                </div>
                <div class="description-container">
                    <span class="description"><?php echo $admin->getAdminContent()->getDescription();?></span>
                </div>
                </div>
            </div>
        </div>
<script src="/js/about/about.js"></script>
</body>
</html>