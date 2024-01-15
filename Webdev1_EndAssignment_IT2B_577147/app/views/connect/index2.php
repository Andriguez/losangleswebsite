<html>
<head>
    <title>connect</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/style/connect/connect.css">

</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div id="page" class="main-container text-center">
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

    <div class="row">
        <div class="col">
            <div class="post-container">
                <div class="post-card shadow-sm">
                    <div class="card-body">
                        <div class="profile-picture">
                            <img class="picture" src="/media/artist1.png" role="img" width="90px" height="90px">
                            <!--<img class="frame" src="/media/picture-frame.svg" role="img" width="90px"> -->
                        </div>
                        <h5 class="poster-name">Angle Name</h5>
                        <h5 class="post-title">Here is the title</h5>
                        <p class="post-content mx-3">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</p>
                        <div class="post-footer">
                            <a class="card-link" onclick="displayComments('general', 1)">3 comments</a>
                            <p>‣</p>
                            <label>posted on <cite title="time stamp">09/12/23 at 17:45</cite></label>
                        </div>
                    </div>
                </div>
                <form action="">
                    <div class="embed-submit-field">
                        <input type="text" placeholder="Say something..."/>
                        <button type="submit">comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php if(isset($posts)){foreach ($posts as $post){?>
    <div class="row">
        <div class="col">
            <div class="post-container">
                <div class="post-card shadow-sm">
                    <div class="card-body">
                        <div class="profile-picture">
                            <img class="picture" src="<?php echo $post->getUser()->getPictureSrc() ?>" role="img" width="90px" height="90px">
                            <!--<img class="frame" src="/media/picture-frame.svg" role="img" width="90px"> -->
                        </div>
                        <h5 class="poster-name"><?php echo $post->getUser()->getFullName()?></h5>
                        <h5 class="post-title"><?php $post->getPostTitle()?></h5>
                        <p class="post-content mx-3"><?php echo $post->getTextContent()?></p>
                        <div class="post-footer">
                            <a class="card-link" onclick="displayComments(<?php echo $post->getTopic()->getTopicName()?>, <?php echo $post->getId()?>)"><?php echo $post->getCommentAmount().' '?>comments</a>
                            <p>‣</p>
                            <label>posted on<cite title="time stamp"><?php echo ' '.$post->getPostedAt()->format('d/m/y').' at '.$post->getPostedAt()->format('H:i')?></cite></label>
                        </div>
                    </div>
                </div>
                <form action="">
                    <div class="embed-submit-field">
                        <input type="text" placeholder="Say something..."/>
                        <button type="submit">comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }}?>

    <div class="col mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination bg-body">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div id="btns-container">
        <a type="button" id="text" onclick="displayPostText('general')"><img src="/media/text-icon.svg" alt=""></a>
        <a type="button" id="more" onclick="openPopUp()"><img src="/media/more-icon.svg" alt=""></a>
    </div>
</div>


<div class="box-popup" id="box-popup">
    <a id="closing-btn" onclick="closePopUp()"><img src="/media/x-icon.svg"></a>
    <div id="box-content"></div>
</div>

<script src="/js/connect/connect.js"></script>
</body>
</html>
