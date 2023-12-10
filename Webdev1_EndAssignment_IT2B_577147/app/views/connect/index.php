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
                <h6><a class="nav-link active" aria-current="page" href="#">General</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">HRT</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">Gigs</a></h6>
            </li>
            <li class="nav-item">
                <h6><a class="nav-link active" aria-current="page" href="#">Other</a></h6>
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

        <div class="col mt-4">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
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

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
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
        background-color: #E5E5E5;
    }
    .card-body{
        margin-left: 4rem;
    }
    .card-body p{
        margin-left: 0;
    }
    .post-card a{
        color: black;
        font-weight: lighter;
    }
    .post-card .post-content{
        margin-left: 0 !important;
    }
    .post-card .post-title{
        font-weight: bold;
        font-size: 22px;
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

    #topics-label {
        position: absolute;
        top: -16px;
        left: 20px;
        height: auto;
        width: 60px;
        background-color: white;
    }

    #topics-nav{
        width: auto;
    }

    #btns-container{
        background-color: #D9D9D9;
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
        border: none; /* Remove default button border */
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
    /* For WebKit browsers (Chrome, Safari) */
    ::-webkit-scrollbar {
        width: 5px; /* Set width of the scrollbar */
    }

    ::-webkit-scrollbar-thumb {
        background-color: silver; /* Color of the thumb */
        border-radius: 3px; /* Rounded corners of the thumb */
    }

    ::-webkit-scrollbar-track {
        background-color: black; /* Color of the track */
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #0056b3; /* Color of the thumb on hover */
    }
</style>