<html>
<head>
    <title>connect</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="style/connect/connect.css">

</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div id="page" class="main-container text-center">
    <div id="topics-container" class="container my-4">
        <h5 id="topics-label">Topics</h5>
        <ul class="nav justify-content-center" id="topics-nav">
            <?php if (isset($topics)){ foreach ($topics as $topic){?>
            <li class="nav-item">
                <p><a class="active nav-link <?php echo ($selectedTopic->getTopicId() === $topic->getTopicId()) ? ' selected-topic' : ''?>" aria-current="page" href="/feed/<?php echo strtolower($topic->getTopicName())?>"><?php echo $topic->getTopicName()?></a></p>
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
                            <a href="#" class="card-link" onclick="openForm('comments-section')">3 comments</a>
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

    <div class="row">
        <div class="col">
            <div class="post-container">
                <div class="post-card shadow-sm">
                    <div class="card-body">
                        <div class="profile-picture">
                            <img class="picture" src="/media/artist2.png" role="img" width="90px" height="90px">
                            <!--<img class="frame" src="/media/picture-frame.svg" role="img" width="90px"> -->
                        </div>
                        <h5 class="poster-name">Angle Name</h5>
                        <h5 class="post-title">Here is the title</h5>
                        <p class="post-content mx-3">Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id. Scelerisque in dictum non consectetur  erat nam. Quis varius quam quisque id.</p>
                        <div class="post-footer">
                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">3 comments</a>
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
                            <a href="#" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">3 comments</a>
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
        <a type="button" id="text" onclick="openForm('post-text')"><img src="/media/text-icon.svg" alt=""></a>
        <a type="button" id="more" onclick="openForm('post-media')"><img src="/media/more-icon.svg" alt=""></a>
    </div>
</div>


<div class="box-popup" id="comments-section">
    <a id="closing-btn" onclick="closeForm('post-text')"><img src="/media/x-icon.svg"></a>
    <div id="comments">
    <div class="comment">
        <div class="name-section">
                <span class="poster-name">poster name</span>
            </div>
            <div class="content-section">
                <span>this is a comment in the comment section</span>
            </div>
            <div class="btns-section">
                <a href="#">reply</a>
                <a href="#">3 replies</a>
            </div>

        <!--<div class="children-comments">
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <img src="/media/triangle-icon.svg">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <img src="/media/triangle-icon.svg">
            <span>this is a comment in the comment section</span>
        </div>
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <img src="/media/triangle-icon.svg">
            <span>this is a comment in the comment section</span>
        </div>
        </div>-->
        </div>
        <div class="comment">
            <div class="name-section">
                <span class="poster-name">poster name</span>
            </div>
            <div class="content-section">
                <span>this is a comment in the comment section</span>
            </div>
            <div class="btns-section">
                <a href="#">reply</a>
            </div>
        </div>
        <div class="comment">
            <div class="name-section">
                <span class="poster-name">poster name</span>
            </div>
            <div class="content-section">
                <span>this is a comment in the comment section</span>
            </div>
            <div class="btns-section">
                <a href="#">reply</a>
                <a href="#">1 replies</a>
            </div>
        <!--<div class="children-comments">
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <img src="/media/triangle-icon.svg">
            <span>this is a comment in the comment section</span>
        </div>
    <div class="child-comment">
        <span class="poster-name">poster name</span>
        <img src="/media/triangle-icon.svg">
        <span>this is a comment in the comment section</span>
    </div>
        </div>-->
        </div>
    </div>
        <form class="comment-submit">
            <input type="text" placeholder="Say something..."/>
            <button type="submit">comment</button>
        </form>
</div>


<div class="box-popup" id="post-text">
    <form action="">
        <button class="dropdown-toggle" type="button" id="filerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            topic
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">topic</a></li>
            <li><a class="dropdown-item" href="#">topic</a></li>
            <li><a class="dropdown-item" href="#">topic</a></li>
        </ul>
    <input type="text" placeholder="title">
    <textarea rows="7" placeholder="content"></textarea>
    <button class="post-btn" type="submit">POST</button>
</form>
    <a id="closing-btn" onclick="closeForm('post-text')"><img src="/media/x-icon.svg"></a>
</div>
<script src="js/connect/connect.js"></script>
</body>
</html>
