<html>
<head>
    <title>artists</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="dropdown mt-1 mb-2 ms-5">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="filerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        discipline filter
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else</a></li>
    </ul>
</div>
<div class="album pt-1 pb-3">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist3.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                    <!--<div class="card-body">
                        <p class="card-text">Artist Name</p>
                    </div>-->
                </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist4.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist5.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist2.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist1.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist2.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="100%" src="/media/artist1.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>

        </div>
            </div>
                </div>
</body>
</html>
<style>
    #artist-link {
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000 !important;
    }
    .album{
    }
    .dropdown-menu{
        border-width: 3px !important;
        border-radius: 0 !important;
        border-color: black !important;
    }
    .dropdown-item:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
    }
    button{
        border-radius: 0 !important;
        border-color: black !important;
        border-width: 4px !important;
        background-color: white !important;
        color: black !important;
        font-weight: bold !important;
    }
    button:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
    }
    .card {
        border-radius: 0 !important;
        border-width: 0;
        height: 15rem;
    }
    .overlay-text{
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: black;
        font-weight: bold;
        font-size: 30px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        text-shadow:
                -1px -1px 0 white,
                1px -1px 0 white,
                -1px 1px 0 white,
                1px 1px 0 white;
    }

    .card:hover{
        border-color: black !important;
        border-width: 3px;
    }
    .card:hover .overlay-text{
        opacity: 1;
    }
    .card img:hover{
        filter: blur(3px);
    }
    body{
        overflow: hidden;
    }
    .album{
        margin: auto;
        overflow-y: scroll;
        max-height: 390px;
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