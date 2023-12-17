<html>
<head>
    <title>connect</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div id="page" class="main-container text-center">
    <div id="topics-container" class="container my-4">
        <h5 id="topics-label">Topics</h5>
        <ul class="nav justify-content-center" id="topics-nav">
            <li class="nav-item">
                <p><a class="nav-link active" aria-current="page" href="#">General</a></p>
            </li>
            <li class="nav-item">
                <p><a class="nav-link active" aria-current="page" href="#">HRT</a></p>
            </li>
            <li class="nav-item">
                <p><a class="nav-link active" aria-current="page" href="#">Gigs</a></p>
            </li>
            <li class="nav-item">
                <p><a class="nav-link active" aria-current="page" href="#">Other</a></p>
            </li>
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
        <a type="button" id="text" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"><img src="/media/text-icon.svg" alt=""></a>
        <a type="button" id="more" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"><img src="/media/more-icon.svg" alt=""></a>
    </div>
</div>


<div class="box-popup" id="comments-section">
        <div class="comment">
            <div class="name-section">
                <span class="poster-name">poster name</span>
            </div>
            <div class="content-section">
                <span>this is a comment in the comment section</span>
            </div>
            <div class="btns-section">
                <a href="#">reply</a>
                <img src="/media/triangle-icon.svg">
                <a href="#">3 replies</a>
            </div>

        <div class="children-comments">
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <span>says</span>
            <span>this is a comment in the comment section</span>
        </div>
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <span>says</span>
            <span>this is a comment in the comment section</span>
        </div>
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <span>says</span>
            <span>this is a comment in the comment section</span>
        </div>
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
                <img src="/media/triangle-icon.svg">
                <a href="#">1 replies</a>
            </div>
        <div class="children-comments">
        <div class="child-comment">
            <span class="poster-name">poster name</span>
            <span>says</span>
            <span>this is a comment in the comment section</span>
        </div>
    <div class="child-comment">
        <span class="poster-name">poster name</span>
        <span>says</span>
        <span>this is a comment in the comment section</span>
    </div>
        </div>
        </div>
        <div class="comment-submit">
            <input type="text" placeholder="Say something..."/>
            <button type="submit">comment</button>
        </div>
    </div>

</body>
    <script>
    function openForm(formId){
        document.getElementById(formId).style.display="block";
        document.getElementById("page").style.filter = "blur(5px)";
        document.getElementById(formId).style.filter="none";
    }

    function closeForm(formId){
        location.reload();
        document.getElementById(formId).style.display = "none";
        document.getElementById("page").style.filter = "none";
    }

</script>
</body>
</html>
<style>
    #connect-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
    .col{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;

    }

    .post-container{
        /*border: 3px solid pink; /* Adjust thickness and color as needed */
        text-align: center;
        justify-content: center;
        position: relative;
        padding: 5px;
        display: inline-block;
        width: auto;
    }

    .post-card{
        border: 5px solid black; /* Adjust thickness and color as needed */
        text-align: left;
        justify-content: left;
        width: 600px;
        margin-top: 1rem;
        margin-left: 1rem;
        padding: 0.5rem;
        background-color: #000000;
        color: white;
    }
    .card-body{
        margin-left: 4rem;
    }
    .card-body p{
        margin-left: 0;
    }
    .post-card a{
        color: white;
        font-weight: lighter;
    }
    .post-card .post-content{
        margin-left: 0 !important;
    }
    .post-card .poster-name{
        font-family: angles;
        font-weight: bold;
        font-size: 12px;
        text-transform: uppercase;
    }
    .post-card .post-title{
        font-family: angles;
        font-size: 17px;
        text-transform: lowercase;
    }
    .post-footer{
        display: flex;
        align-items: center;
        justify-content: flex-end;
        font-size: 14px;
        margin-bottom: 0;
    }
    .post-footer p{
        margin: 0 4px;

    }
    .post-card label{
        font-weight: lighter;
    }

    .picture{
        position: absolute;
        z-index: 2 !important;
        border: black solid 3px;
    }

    .frame{
        position: absolute;
        z-index: 3 !important;
    }
    .profile-picture{
        position: absolute;
        top: 0;
        left: 0;
    }
    .embed-submit-field{
        position: relative;
        margin-left: 1rem;
    }
    .embed-submit-field input {
        width: 100%;
        padding: 10px;
        border: 3px solid black;
    }
    .embed-submit-field button {
        position: absolute;
        right: 10px;
        top: 7px;
        border-width: 3px;
        font-weight: bold;
        background-color: white;
    }
    .embed-submit-field button:hover {
        background-color: black;
        border-color: white;
        color: white;
    }
    #topics-container{
        border: 3px solid black; /* Adjust thickness and color as needed */
        text-align: center;
        justify-content: center;
        position: relative;
        padding: 5px;
        display: inline-block;
        width: auto;
    }
    #topics-container a{
        font-size: 9px !important;
    }
    #topics-container p{
        margin-bottom: 0;
    }
    #topics-label {
        position: absolute;
        top: -7px;
        left: 20px;
        height: auto;
        width: 75px;
        background-color: white;
        font-family: angles;
        font-size: 10px !important;
        text-transform: uppercase;
    }

    #topics-nav{
        width: auto;
    }

    #btns-container{
        background-color: #000000;
        width: 8rem;
        height: auto;
        border: 3px solid black;
        padding: .4rem;
        position: absolute;
        bottom: 2rem;
        right: 4rem;
    }

    #btns-container img{
        width: 3rem;
        height: 3rem; /* Maintain aspect ratio */
        border: silver solid 1px; /* Remove default button border */
        cursor: pointer;
    }

    body{
        overflow: hidden;
    }

    #page{
        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 445px;
    }

    .box-popup{
        border: black solid 3px;
        width: 600px;
        height: 400px;
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9;
        background-color: white;
    }

    /* For WebKit browsers (Chrome, Safari) */
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

    #comments-section{
        overflow-y: scroll;
        background-color: white;
        width: 500px;

    .name-section{
        margin-top: 5px;
        margin-bottom: 2px;
        }

    a{
        text-decoration: none;
        color: white;
        font-family: angles;
        font-size: 10px;
    }
    a:hover{
        background-color: black;
        filter: invert(100%);
    }

    .poster-name{
        font-family: angles !important;
        font-size: 10px;
        text-transform: uppercase;
    }
    .comment{
        border: white solid 2px;
        color: white;
        background-color: black;
        padding: 5px;
        margin-bottom: 5px;

        .btns-section{
            display: flex;
            justify-content: flex-end;

            img{
                filter: invert(100%);
                width: 7px !important;
                height: 7px !important;
                margin: 4px;
            }
        }
    }
    .child-comment{
        border: white solid 2px;
        width: 100%;
        margin: auto;
        color: white;
        background-color: black;
        padding: 5px;
    }
    .comment-submit{
        width: 100%;
        position: sticky;
        bottom: 0;
    }
    .comment-submit input{
        width: 100%;
        position: relative;

    }
    .comment-submit button {
        border-width: 3px;
        font-weight: bold;
        background-color: white;
        position: absolute;
        right: 0;
    }
    .comment-submit button:hover {
        background-color: black;
        border-color: white;
        color: white;
    }  }

</style>