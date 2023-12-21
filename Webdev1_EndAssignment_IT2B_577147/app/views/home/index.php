<?php

?>
<html>
<head>
    <title>Los Angles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div id="page" class="container px-0">
        <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">

            <div class="col mb-1 mb-md-0">
                <ul class="nav justify-content-center">
                    <li class="nav-item"><h3><a href="/artists" class="nav-link mt-3 mx-4 text-reset">Artists</a></h3></li>
                    <li class="nav-item"><h3><a href="/events" class="nav-link mt-3 mx-4 text-reset">Events</a></h3></li>
                    <div class="mb-2 mb-md-0 mx-5">
                        <!-- Centered Brand -->
                        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                            <img src="/media/logo_placeholder.png" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
                        </a>
                    </div>

                    <li class="nav-item"><h3><a href="/about" class="nav-link mt-3 mx-4 text-reset">About</a></h3></li>
                    <li class="nav-item"><h3><a href="/connect" class="nav-link mt-3 ms-3 me-4 text-reset" id="connectDropdown" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                            <ul class="dropdown-menu" aria-labelledby="connectDropdown">
                                <li><a class="dropdown-item" href="/register">register</a></li>
                                <li><a class="dropdown-item" href="/login">login</a></li>
                                <li><a class="dropdown-item" href="/login/logout">logout</a></li>

                            </ul>
                            </h3>
                    </li>
                </ul>
            </div>
        </header>



        <!--<img class="logoHomepage" src="/media/trialpagelogo.png" alt="Logo" width="920" height="450">-->
        <img class="logoHomepage" src="/media/triangle-big-crop1.png" alt="Logo" width="930" height="450">
</div>


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    @font-face {
        font-family: 'angles';
        src: url('/style/losangles-font.ttf');
    }
    .dropdown-menu{
        border-width: 3px !important;
        border-radius: 0 !important;
        border-color: black !important;
        font-family: angles;
        font-size: 12px;
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
    body{
        background-color: white;
        }


    .logoHomepage {
        position: absolute;
        left: 147px;

    }
    .dropdown-item:active{
        background-color: black !important;
    }
    a.nav-link:hover{
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000;
    }
    a.nav-link{
        color: black !important;
        font-family: angles;
        font-size: 16px !important;
        /*font-size: 18px !important;*/
        text-transform: uppercase;
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