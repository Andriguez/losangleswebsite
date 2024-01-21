<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header class="py-2">
        <div id="desktop-nav-bar">
            <ul class="nav justify-content-center flex-nowrap">
                <li class="nav-item"><h3><a id="artist-link" href="/artists" class="nav-link mt-3 mx-md-2 mx-lg-4 mx-xl-5 text-reset">Artists</a></h3></li>
                <li class="nav-item"><h3><a id="events-link" href="/events" class="nav-link mt-3 mx-md-2 mx-lg-4 mx-xl-5 text-reset">Events</a></h3></li>

                <div class="nav-logo mb-2 mb-md-0 mx-sm-4 mx-md-4 mx-xl-5">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                        <img id="nav-logo-desktop" src="<?php echo $logoSrc ?? ''?>" alt="Logo" class="d-inline-block align-text-top">
                    </a>
                </div>

                <li class="nav-item"><h3><a id="about-link" href="/about" class="nav-link mt-3 mx-md-2 mx-lg-4 mx-xl-5 text-reset">About</a></h3></li>
                <li class="nav-item"><h3><a id="connect-link" class="nav-link mt-3 mx-md-2 mx-lg-4 mx-xl-5 text-reset" data-bs-toggle="dropdown" aria-expanded="false">Connect</a>
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

        <div id="mobile-nav-bar">
            <div id="nav-logo" class="nav-logo mt-3 mb-md-0 mx-5">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none navbar-brand">
                    <img id="navbar-logo" src="<?php echo $logoSrc ?? ''?>" alt="Logo" class="d-inline-block align-text-top">
                </a>
            </div>
            <div id="nav-item-conatiner">
                <div id="nav-menu-button" class="nav-item"><a id="menu-button" class="nav-link mt-3 mx-5" data-bs-toggle="dropdown" aria-expanded="false"><img id="menu-icon" src="/media/icons/menu-icon-transparent.svg"></a>
                    <ul class="dropdown-menu" aria-labelledby="menu-button">
                        <li><a id="artist-link" class="nav-link nav-menu-item" href="/artists">Artists</a></li>
                        <li><a id="events-link" class="nav-link nav-menu-item" href="/events">Events</a></li>
                        <li><a id="about-link" class="nav-link nav-menu-item" href="/about">About</a></li>
                        <li><span id="connect-link" class="nav-link nav-menu-item">Connect</span>
                            <ul style="list-style-type: none;">
                                <?php if(isset($loggedUser)){?>
                                    <li id="logged-user-name"><label>Welcome, </label><span> <?php echo $loggedUser->getFirstName();?></span></li>
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
                        </li>
                    </ul>
                </div>
            </div>
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
    @media (max-width: 400px){
        #desktop-nav-bar{
            display: none;
        }
        #mobile-nav-bar{
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
            z-index: 9999;

            #menu-icon{
                width: 40px;
                height: 40px;
            }

            #navbar-logo{
                width: 80px;
                height: 40px;
            }
            .nav-menu-item{
                margin: 5px;
            }
        }
    }
    @media (min-width: 400px){
        #desktop-nav-bar{
            display: none;
        }
        #mobile-nav-bar{
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
            z-index: 9999;

            #menu-icon{
                width: 60px;
                height: 60px;
            }

            #navbar-logo{
                width: 100px;
                height: 60px;
            }
            .nav-menu-item{
                margin: 5px;
            }
        }
    }
    @media (min-width: 400px) {
        #desktop-nav-bar{
            display: none;
        }
        #mobile-nav-bar{
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
            z-index: 9999;

            #menu-icon{
                width: 80px;
                height: 75px;
            }

            #navbar-logo{
                width: 160px;
                height: 65px;
            }
        }
        .nav-menu-item{
            margin: 5px;
        }
    }

    @media (min-width: 600px){
        #desktop-nav-bar{
            display: none;
        }
        #mobile-nav-bar{
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
            z-index: 9999;

            #menu-icon{
                width: 60px;
                height: 60px;
            }

            #navbar-logo{
                width: 120px;
                height: 60px;
            }
        }
        .nav-menu-item{
            margin: 5px;
        }
    }

    @media (min-width: 910px){
        #mobile-nav-bar {
            display: none;
        }
        #desktop-nav-bar{
            display: block;
            #logged-user-name{
                padding: 5px;
            }

            #nav-logo-desktop{
                width: 120px;
                height: 60px;
            }
        }
        .dropdown-item{
            padding: 5px;
        }

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
    .nav-link{
        color: black;
        font-family: angles;
        font-size: 16px !important;
        /*font-size: 18px !important;*/
        text-transform: uppercase;
    }
    #nav-menu-button{
        position: sticky;
        float: left;
    }
    #menu-button:hover{
        filter: invert(100);
        background-color: white;
    }

    #nav-logo {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #nav-item-conatiner{
        position: absolute;
        right: 0;
        top: 0;
    }
    #logged-user-name{
        label{
            font-family: "Agency FB";
            font-size: 16px;
        }
    }
</style>