<html>
<head>
    <title>artists</title>
</head>
<body>
<?php include __DIR__.'/../navbar.php'?>
<div class="dropdown mt-5 ms-3">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="filerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        discipline filter
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else</a></li>
    </ul>
</div>
<div class="album py-5">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="225" src="/media/artist1.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                    <!--<div class="card-body">
                        <p class="card-text">Artist Name</p>
                    </div>-->
                </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="225" src="/media/artist2.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="225" src="/media/artist1.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="225" src="/media/artist2.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="225" src="/media/artist1.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>
            <div class="col">
                <a class="button" href="#"><div class="card shadow-sm position-relative">
                        <img class="img" width="100%" height="225" src="/media/artist2.png" role="img" focusable="false">
                        <div class="overlay-text">Artist Name</div>
                        <!--<div class="card-body">
                            <p class="card-text">Artist Name</p>
                        </div>-->
                    </div></a>
            </div>


        </div>
            </div>
                </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    .dropdown-menu{
        border-width: 3px !important;
        border-radius: 0 !important;
        border-color: black !important;
    }
    button{
        border-radius: 0 !important;
        border-color: black !important;
        border-width: 4px !important;
        background-color: white !important;
        color: black !important;
        font-weight: bold !important;
    }

    .card {
        border-radius: 0 !important;
    }
    .overlay-text{
        position: absolute;
        top: 50%;
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

    .card:hover .overlay-text{
        opacity: 1;
    }
    .card img:hover{
        filter: blur(3px);
    }
</style>