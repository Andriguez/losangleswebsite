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
    <title>manage Buttons</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="mainPage">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <!--VISITOR NAVBAR-->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Visitor navbar
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">
                        <div class="col mb-1 mb-md-0">
                            <ul class="nav justify-content-center">
                                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="<?php echo ($atHomepage) ? $artistClass[1] : $artistClass[0] ?>">Artists</a></h3></li>
                                <li class="nav-item"><h3><a id="events-link" href="/events" class="<?php echo ($atHomepage) ? $eventsClass[1] : $eventsClass[0] ?>">Events</a></h3></li>

                                <div class="nav-logo mb-2 mb-md-0 mx-5">
                                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                                        <img src="/media/logoplaceholder.png" width="90" height="60" alt="Logo" class="d-inline-block align-text-top">
                                    </a>
                                </div>

                                <li class="nav-item"><h3><a id="about-link" href="/about" class="<?php echo ($atHomepage) ? $aboutClass[1] : $aboutClass[0] ?>">About</a></h3></li>
                                <li class="nav-item"><h3><a id="connect-link" class="<?php echo ($atHomepage) ? $connectClass[1] : $connectClass[0] ?>" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                                        <ul class="dropdown-menu" aria-labelledby="connect-link">
                                            <li><a class="dropdown-item" href="/register">register</a></li>
                                            <li><a class="dropdown-item" href="/login">login</a></li>
                                        </ul>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    </header>

                    <!--INPUT GROUP-->
                    <div class="input-container mt-4">
                    <div class="input-group mb-3"">
                        <label class="input-group-text" for="inputGroupSelect01">1st</label>
                        <select class="form-select" id="inputGroupSelect01">
                            <option value="1" selected>Artist page</option>
                            <option value="2">Events page</option>
                            <option value="3">About page</option>
                            <option value="4">Connect page</option>
                        </select>
                        <span class="input-group-text " id="first-text-input">text</span>
                        <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="first-text-input">
                        <span class="input-group-text" id="first-link-input">link</span>
                        <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="first-link-input">
                    </div>

                    <div class="input-group mb-3"">
                    <label class="input-group-text" for="inputGroupSelect01">2nd</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option value="2" selected>Events page</option>
                        <option value="1">Artist page</option>
                        <option value="3">About page</option>
                        <option value="4">Connect page</option>
                    </select><span class="input-group-text " id="second-text-input">text</span>
                    <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="second-text-input">
                    <span class="input-group-text" id="second-link-input">link</span>
                    <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="second-link-input">
                </div>

                <div class="input-group mb-3"">
                <label class="input-group-text" for="inputGroupSelect01">3rd</label>
                <select class="form-select" id="inputGroupSelect01">
                    <option value="3" selected>About page</option>
                    <option value="1">Artist page</option>
                    <option value="2">Events page</option>
                    <option value="4">Connect page</option>
                </select>
                <span class="input-group-text " id="third-text-input">text</span>
                <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="third-text-input">
                <span class="input-group-text" id="third-link-input">link</span>
                <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="third-link-input">
            </div>

            <div class="input-group mb-3"">
            <label class="input-group-text" for="inputGroupSelect01">4th</label>
            <select class="form-select" id="inputGroupSelect01">
                <option value="4" selected>Connect page</option>
                <option value="1">Artist page</option>
                <option value="2">Events page</option>
                <option value="3">About page</option>
            </select>
            <span class="input-group-text " id="third-text-input">text</span>
            <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="third-text-input">
            <span class="input-group-text" id="third-link-input">link</span>
            <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="third-link-input">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
            </div>
            <div class="dropdown-options-container">
                <div id="first-option"
                    <span class="input-group-text " id="first-option-text-input">text</span>
                    <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="first-option-text-input">
                    <span class="input-group-text" id="first-option-link-input">link</span>
                    <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="first-option-link-input">
                </div>
                <div id="second-option"
                     <span class="input-group-text " id="second-option-text-input">text</span>
                    <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="second-option-text-input">
                    <span class="input-group-text" id="third-link-input">link</span>
                    <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="second-option-link-input">
                </div>
                <div id="third-option"
                    <span class="input-group-text " id="third-option-text-input">text</span>
                    <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="third-option-text-input">
                    <span class="input-group-text" id="third-option-link-input">link</span>
                    <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="third-option-link-input">
                </div>
                <div id="fourth-option"
                    <span class="input-group-text " id="fourth-option-text-input">text</span>
                    <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="fourth-option-text-input">
                    <span class="input-group-text" id="fourth-option-link-input">link</span>
                    <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="fourth-option-link-input">
                </div>
                <div id="fifth-option"
                    <span class="input-group-text " id="fifth-option-text-input">text</span>
                    <input type="text" class="form-control text-input" aria-label="Sizing example input" aria-describedby="fifth-option-text-input">
                    <span class="input-group-text" id="fifth-oprion-link-input">link</span>
                    <input type="text" class="form-control link-input" aria-label="Sizing example input" aria-describedby="fifth-option-link-input">
                </div>
            </div>
        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--USER NAVBAR-->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    User navbar
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">
                        <div class="col mb-1 mb-md-0">
                            <ul class="nav justify-content-center">
                                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="<?php echo ($atHomepage) ? $artistClass[1] : $artistClass[0] ?>">Artists</a></h3></li>
                                <li class="nav-item"><h3><a id="events-link" href="/events" class="<?php echo ($atHomepage) ? $eventsClass[1] : $eventsClass[0] ?>">Events</a></h3></li>

                                <div class="nav-logo mb-2 mb-md-0 mx-5">
                                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                                        <img src="/media/logoplaceholder.png" width="90" height="60" alt="Logo" class="d-inline-block align-text-top">
                                    </a>
                                </div>

                                <li class="nav-item"><h3><a id="about-link" href="/about" class="<?php echo ($atHomepage) ? $aboutClass[1] : $aboutClass[0] ?>">About</a></h3></li>
                                <li class="nav-item"><h3><a id="connect-link" class="<?php echo ($atHomepage) ? $connectClass[1] : $connectClass[0] ?>" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                                        <ul class="dropdown-menu" aria-labelledby="connect-link">
                                            <span>user name</span>
                                            <li><a class="dropdown-item" href="/feed">feed</a></li>
                                            <li><a class="dropdown-item" href="/logout">logout</a></li>
                                        </ul>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    </header>

                </div>
            </div>
        </div>

        <!--ADMIN NAVBAR-->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Admin navbar
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <header class="d-flex flex-nowrap align-items-center justify-content-between pt-2">
                        <div class="col mb-1 mb-md-0">
                            <ul class="nav justify-content-center">
                                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="<?php echo ($atHomepage) ? $artistClass[1] : $artistClass[0] ?>">Artists</a></h3></li>
                                <li class="nav-item"><h3><a id="events-link" href="/events" class="<?php echo ($atHomepage) ? $eventsClass[1] : $eventsClass[0] ?>">Events</a></h3></li>

                                <div class="nav-logo mb-2 mb-md-0 mx-5">
                                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                                        <img src="/media/logoplaceholder.png" width="90" height="60" alt="Logo" class="d-inline-block align-text-top">
                                    </a>
                                </div>

                                <li class="nav-item"><h3><a id="about-link" href="/about" class="<?php echo ($atHomepage) ? $aboutClass[1] : $aboutClass[0] ?>">About</a></h3></li>
                                <li class="nav-item"><h3><a id="connect-link" class="<?php echo ($atHomepage) ? $connectClass[1] : $connectClass[0] ?>" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
                                        <ul class="dropdown-menu" aria-labelledby="connect-link">
                                            <span>user name</span>
                                            <li><a class="dropdown-item" href="/feed">feed</a></li>
                                            <li><a class="dropdown-item" href="/admin">admin</a></li>
                                            <li><a class="dropdown-item" href="/logout">logout</a></li>
                                        </ul>
                                    </h3>
                                </li>
                            </ul>
                        </div>
                    </header>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
<style>
    .accordion-body{
        margin: 0 !important;
        padding: 20px 0 20px 0 !important;

    .input-group{
        max-width: 700px;
        margin: auto;
        border-radius: 0;

        .text-input{
            width: 80px;
        }
        .link-input{
            width: 200px;
        }
    }

    .input-container{
    }
    }
    @font-face {
        font-family: 'angles';
        src: url('/style/losangles-font.ttf');
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

    .separator{
        font-family: "Agency FB";
        margin-top: 20px;
        margin-bottom: 20px;
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