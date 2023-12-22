<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();}

     $atHomepage = ($_SERVER['REQUEST_URI'] == "/");

    $artistClass = ['nav-link mt-3 mx-5 text-reset', 'nav-link mt-3 mx-4 text-reset'];
    $eventsClass = ['nav-link mt-3 mx-5 text-reset', 'nav-link mt-3 mx-4 text-reset'];
    $logoInfo = ['src="/media/logocrop.jpeg" width="90" height="60"',
        'src="/media/logo_placeholder.png" width="125" height="80"'];
    $aboutClass = ['nav-link mt-3 mx-5 text-reset', 'nav-link mt-3 mx-4 text-reset'];
    $connectClass = ['nav-link mt-3 ms-4 me-5 text-reset', 'nav-link mt-3 ms-3 me-4 text-reset'];
?>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">
        <div class="col mb-1 mb-md-0">
            <ul class="nav justify-content-center">
                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="<?php echo ($atHomepage) ? $artistClass[1] : $artistClass[0] ?>">Artists</a></h3></li>
                <li class="nav-item"><h3><a id="events-link" href="/events" class="<?php echo ($atHomepage) ? $eventsClass[1] : $eventsClass[0] ?>">Events</a></h3></li>

                <div class="nav-logo mb-2 mb-md-0 mx-5">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                        <img <?php echo ($atHomepage) ? $logoInfo[1] : $logoInfo[0] ?> alt="Logo" class="d-inline-block align-text-top">
                    </a>
                </div>

                <li class="nav-item"><h3><a id="about-link" href="/about" class="<?php echo ($atHomepage) ? $aboutClass[1] : $aboutClass[0] ?>">About</a></h3></li>
                <li class="nav-item"><h3><a id="connectDropdown" class="<?php echo ($atHomepage) ? $connectClass[1] : $connectClass[0] ?>" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                        <ul class="dropdown-menu" aria-labelledby="connectDropdown">
                            <?php if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'];?>
                                <li><a class="dropdown-item" href="/feed">feed</a></li>
                                <?php if(isset($_SESSION['user_type'])&& $_SESSION['user_type'] === 'developer' || $_SESSION['user_type'] === 'admin'){?>
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
        src: url('/style/losangles-font.ttf');
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