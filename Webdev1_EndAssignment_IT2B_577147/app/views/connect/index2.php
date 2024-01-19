<html>
<head>
    <title>connect</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/connect/connect.css">
</head>
<body>
<?php $this->navbar->displayNavbar();?>
<div id="page" data-section-name="<?php echo $this->selectedTopic->getTopicName()?>" class="main-container text-center">
    <div id="topics-container" class="container my-4">
        <h5 id="topics-label">Topics</h5>
        <ul class="nav justify-content-center" id="topics-nav">
            <?php if (isset($topics)){ foreach ($topics as $topic){?>
            <li class="nav-item">
                <p><a class="active nav-link <?php echo ($this->selectedTopic->getTopicId() === $topic->getTopicId()) ? ' selected-topic' : ''?>" aria-current="page" href="/feed/<?php echo strtolower($topic->getTopicName())?>"><?php echo $topic->getTopicName()?></a></p>
            </li>
            <?php }} ?>
        </ul>
    </div>

<div id="all-posts-container">

</div>

    <div id="btns-container">
        <a type="button" id="text" onclick="displayPostText('general')"><img src="/media/text-icon.svg" alt=""></a>
        <!--<a type="button" id="more" onclick="openPopUp()"><img src="/media/more-icon.svg" alt=""></a>-->
    </div>
</div>


<div class="box-popup" id="box-popup">
    <a id="closing-btn" onclick="closePopUp()"><img src="/media/x-icon.svg"></a>
    <div id="box-content"></div>
</div>

<script src="/js/connect/connect.js"></script>
</body>
</html>
