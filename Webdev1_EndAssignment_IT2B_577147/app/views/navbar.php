<?php
?>
<!--<html>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-2 pb-3 mb-4">

    <ul class="nav col-12 mb-2 justify-content-center mb-md-0">
        <li><h3><a href="#" class="nav-link mt-3 ms-2 me-3 ps-2 pe-5">Artists</a></h3></li>
        <li><h3><a href="#" class="nav-link mt-3 mx-4 px-5">Events</a></h3></li>
        <div class="mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand px-5">
                <img src="/media/logocrop.jpeg" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
            </a>
        </div>

        <li><h3><a href="#" class="nav-link mt-3 mx-4 px-5">About</a></h3></li>
        <li><h3><a href="#" class="nav-link mt-3 ms-3 me-2 ps-4 pe-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Register</a></li>
                    <li><a class="dropdown-item" href="#">Login</a></li>
                </ul>
            </h3>
        </li>
    </ul>
</header>


<h1>second version</h1>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-2 pb-3 mb-4">
    <ul class="nav col-12 mb-2 justify-content-center mb-md-0">
        <li><h3><a href="#" class="nav-link mt-3 ms-2 me-3 ps-3 pe-5 pe-md-5 px-md-5">Artists</a></h3></li>
        <li><h3><a href="#" class="nav-link mt-3 mx-4 px-5">Events</a></h3></li>

        <li class="nav-item">
            <a href="/" class="d-inline-flex mx-5 text-decoration-none navbar-brand">
                <img src="/media/logo_placeholder.png" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
            </a>
        </li>

        <li><h3><a href="#" class="nav-link mt-3 mx-4 px-5 px-md-5 ">About</a></h3></li>
        <li><h3><a href="#" class="nav-link mt-3 ms-3 me-2 ps-5 pe-1 ps-md-5 pe-md-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Register</a></li>
                    <li><a class="dropdown-item" href="#">Login</a></li>
                </ul>
            </h3></li></ul>
</header> -->
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2 text-secondary">

        <div class="col mb-1 mb-md-0">
            <ul class="nav justify-content-center text-bg-body">
                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="nav-link mt-3 mx-5">Artists</a></h3></li>
                <li class="nav-item"><h3><a id="events-link" href="/events" class="nav-link mt-3 mx-5">Events</a></h3></li>
                <div class="mb-2 mb-md-0 mx-5">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                        <img src="/media/logocrop.jpeg" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
                    </a>
                </div>

                <li class="nav-item"><h3><a id="about-link" href="/about" class="nav-link mt-3 mx-5">About</a></h3></li>
                <li class="nav-item"><h3><a id="connect-link" href="/connect" class="nav-link mt-3 ms-4 me-5" aria-expanded="false">Connect</a>
                        <!--<ul class="dropdown-menu" aria-labelledby="connectDropdown">
                            <li><a class="dropdown-item" href="#">Register</a></li>
                            <li><a class="dropdown-item" href="/login">Login</a></li>
                        </ul>-->
                    </h3>
                </li>
            </ul>
        </div>
    </header>
</body>
</html>
<style>

    .logoHomepage {
        position: absolute;
        left: 147px;
    }

    #artist-link, #connect-link{
        font-size: 20px;
    }
    #events-link, #about-link{
        font-size: 25px;
    }
    .dropdown-item:active{
        background-color: black !important;
    }
    a.nav-link:hover{
        /**font-size: 105% !important;*/
        text-transform: uppercase;
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000;
    }
    a.nav-link{
        color: black !important;
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