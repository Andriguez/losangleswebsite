<?php

?>
<html>
<head>
    <title>Los Angles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div id="page" class="container px-0">
        <!--
        <header class="d-flex flex-wrap align-items-center justify-content-between pt-2 pb-3 mb-4">
            <ul class="nav col-12 mb-2 justify-content-center mb-md-0">
                <li><h3><a href="#" class="nav-link mt-3 ms-2 me-3 ps-2 pe-3 pe-md-5">Artists</a></h3></li>
                <li><h3><a href="#" class="nav-link mt-3 mx-3 mx-md-4 px-3 px-md-5">Events</a></h3></li>

                <li class="nav-item">
                    <a href="/" class="d-inline-flex link-body-emphasis ms-5 me-4 text-decoration-none navbar-brand">
                        <img src="/media/logo_placeholder.png" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
                    </a>
                </li>

                <li><h3><a href="#" class="nav-link mt-3 mx-3 mx-md-4 px-3 px-md-5">About</a></h3></li>
                <li>
                    <h3>
                        <a href="#" class="nav-link mt-3 ms-3 me-2 ps-3 pe-2 ps-md-5 pe-md-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Register</a></li>
                            <li><a class="dropdown-item" href="#">Login</a></li>
                        </ul>
                    </h3>
                </li>
            </ul>
        </header>
-->
        <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">

            <div class="col mb-3 mb-md-0">
                <!-- Navigation Links -->
                <ul class="nav justify-content-center">
                    <li class="nav-item"><h3><a href="#" class="nav-link mt-3 mx-5">Artists</a></h3></li>
                    <li class="nav-item"><h3><a href="#" class="nav-link mt-3 mx-5">Events</a></h3></li>
                    <div class="mb-2 mb-md-0 mx-5">
                        <!-- Centered Brand -->
                        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                            <img src="/media/logo_placeholder.png" alt="Logo" width="125" height="80" class="d-inline-block align-text-top">
                        </a>
                    </div>

                    <li class="nav-item"><h3><a href="#" class="nav-link mt-3 mx-5">About</a></h3></li>
                    <li><!-- Connect Dropdown -->
                        <h3><a class="nav-link mt-3 ms-4 me-5" id="connectDropdown" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                            <ul class="dropdown-menu" aria-labelledby="connectDropdown">
                                <li><a class="dropdown-item" href="#">Register</a></li>
                                <li><a class="dropdown-item" href="#">Login</a></li>
                            </ul>
                            </h3>
                    </li>
                </ul>
            </div>
        </header>



        <img class="logoHomepage" src="/media/onlytb.png" alt="Logo" width="1085" height="400">
</div>


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<style>
    @page {
    }

    body{
        background-color: white;
    }

    .logoHomepage {
        position: absolute;
        left: 50px;
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