<?php

?>
<html>
<head>
    <title>Los Angles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="page" class="container">
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
    <div id="page" class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-2 pb-3 mb-4">

            <ul class="nav col-12 mb-2 justify-content-center mb-md-0">
                <li><h3><a href="#" class="nav-link mt-3 ms-2 me-3 ps-2 pe-5">Artists</a></h3></li>
                <li><h3><a href="#" class="nav-link mt-3 mx-4 px-5">Events</a></h3></li>
                <div class="mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand px-5">
                        <img src="/media/logo_placeholder.png" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
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

        <!--<img class="logoHomepage" src="/media/onlytb.png" alt="Logo" width="1085" height="540">-->
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<style>
    @page {
        position: relative;
        width: 100%;
        height: 500px; /* Set the height as needed */
        background-color: #f0f0f0;
    }

    .logoHomepage {
        position: absolute;
        top: -7px; /* Adjust the top position as needed */
        left: 50px; /* Adjust the left position as needed */
        z-index: 1; /* Set the z-index value */
    }

    a:hover{
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000;
    }
    a{
        color: black !important;
    }
</style>