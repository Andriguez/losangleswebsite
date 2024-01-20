<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">
        <div class="col mb-1 mb-md-0">
            <ul class="nav justify-content-center">
                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="nav-link mt-3 mx-5 text-reset">Artists</a></h3></li>
                <li class="nav-item"><h3><a id="events-link" href="/events" class="nav-link mt-3 mx-5 text-reset">Events</a></h3></li>

                <div class="nav-logo mb-2 mb-md-0 mx-5">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                        <img src="/media/logos/logo-letters-bigger.png" width="90" height="60" alt="Logo" class="d-inline-block align-text-top">
                    </a>
                </div>

                <li class="nav-item"><h3><a id="about-link" href="/about" class="nav-link mt-3 mx-5 text-reset">About</a></h3></li>
                <li class="nav-item"><h3><a id="connect-link" class="nav-link mt-3 ms-4 me-5 text-reset" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                        <ul class="dropdown-menu" aria-labelledby="connect-link">
                            <?php if(isset($loggedUser)){?>
                                    <li><span><?php echo $loggedUser->getFullName();?></span></li>
                                <li><a class="dropdown-item" href="/feed">feed</a></li>
                                <?php if($loggedUser->getUserType()->getUserType() === 'developer' || $loggedUser->getUserType()->getUserType() === 'admin'){?>
                                    <li><a class="dropdown-item" href="/admin">admin</a></li>
                                    <?php } ?>
                                <li><a class="dropdown-item" href="/logout">logout</a></li>
                            <?php } else{ ?>
                                <li><a class="dropdown-item" href="/register">register</a></li>
                                <li><a class="dropdown-item" href="/login">login</a></li>
                            <?php } ?>
                        </ul>
                    </h3>
                </li>
            </ul>
        </div>
    </header>
</body>
</html>
<script>

</script>
<style>
    @font-face {
        font-family: 'angles';
        src: url('/style/fonts/losangles-font.ttf');
    }

    .logoHomepage {
        position: absolute;
        left: 147px;
    }
    .dropdown-menu{
        border-width: 3px !important;
        border-radius: 0 !important;
        border-color: black !important;
        font-family: angles;
        font-size: 10px;
        text-transform: uppercase;
    }
    .dropdown-item:hover {
        background-color: black !important;
        border-color: white !important;
        color: white !important;
    }
    .dropdown-item:active{
        background-color: black !important;
    }
    a.nav-link:hover{
        /**font-size: 105% !important;
        text-transform: uppercase;*/
        color: white !important; /* New text color on hover */
        text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000000;
        cursor: pointer;
    }
    a.nav-link{
        color: black;
        font-family: angles;
        font-size: 16px !important;
        /*font-size: 18px !important;*/
        text-transform: uppercase;
    }

    @media (max-width: 1200px) {
        .nav-link {
            /*margin-left:  auto !important;
            margin-right: auto !important;*/
        }
    }
</style>