<html>
<head>
    <title>Admin page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px; height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-reset text-decoration-none">
        <img src="/media/onlytb.png" id="logo" width="60" height="40">
        <span class="fs-4">Los Angles Admin</span>
    </a>
    <hr>
    <div id="menu-container">
    <!--<ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a href="#" class="nav-link text-reset"> <!- active aria-current="page"->Home</a></li>
        <li><a href="#" class="nav-link text-reset">Dashboard</a></li>
        <li><a href="#" class="nav-link text-reset"></a></li>
        <li><a href="#" class="nav-link text-reset">Products</a></li>
        <li><a href="#" class="nav-link text-reset">Customers</a></li>
    </ul>-->
        <div class="accordion accordion-flush" id="main-accordion">

            <!--CONTENT ACCORDION-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-flush-collapse" aria-expanded="false" aria-controls="content-flush-collapse">
                        Content
                    </button>
                </h2>
                <div id="content-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#main-accordion">
                    <div class="accordion-body">

                        <!--CONTENT CHiLD ACCORDION-->
                        <div class="child-accordion accordion accordion-flush" id="content-child-accordion">

                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-artist-flush-collapse" aria-expanded="false" aria-controls="content-artist-flush-collapse">
                                        Artists
                                    </button>
                                </h2>
                                <div id="content-artist-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION ARTISTS OPTIONS-->
                                        <ul class="nav nav-pills flex-column mb-auto">
                                            <li><a href="#" class="nav-link text-reset">disciplines</a></li>
                                            <li><a href="#" class="nav-link text-reset">bios</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-events-flush-collapse" aria-expanded="false" aria-controls="content-events-flush-collapse">
                                        Events
                                    </button>
                                </h2>
                                <div id="content-events-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION EVENTS OPTIONS-->

                                    </div>
                                </div>
                            </div>

                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-about-flush-collapse" aria-expanded="false" aria-controls="content-about-flush-collapse">
                                        About
                                    </button>
                                </h2>
                                <div id="content-about-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION ABOUT OPTIONS-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--USERS ACCORDION-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#users-flush-collapse" aria-expanded="false" aria-controls="users-flush-collapse">
                        Users
                    </button>
                </h2>
                <div id="users-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#main-accordion">
                    <div class="accordion-body">
                        <!--USERS CHILD ACCORDION-->

                    </div>
                </div>
            </div>

            <!--APPLICATIONS ACCORDION-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#applications-flush-collapse" aria-expanded="false" aria-controls="applications-flush-collapse">
                        Applications
                    </button>
                </h2>
                <div id="applications-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#main-accordion">
                    <div class="accordion-body">
                        <!--APPLICATIONS CHILD ACCORDION-->

                    </div>
                </div>
            </div>

            <!--FEED ACCORDION-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#feed-flush-collapse" aria-expanded="false" aria-controls="feed-flush-collapse">
                        Feed
                    </button>
                </h2>
                <div id="feed-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#main-accordion">
                    <div class="accordion-body">
                        <!--FEED CHILD ACCORDION-->

                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <div id="admin-info-container">
        <a href="#" class="d-flex align-items-center text-reset text-decoration-none" aria-expanded="false">
            <img src="/media/artist1.png" alt="" width="40" height="40" class="ms-3 me-2">
            <strong>admin name</strong>
        </a>
    </div>
</div>
<div id="main-window" style="flex-grow: 1; padding: 20px;">
    <h1>this is the main window</h1>
</div>
</body>
</html>
<style>
    body{
        font-family: "Agency FB";
        color: black !important;
        font-size: 20px;
        display: flex;
        overflow: hidden;
    }
    #main-window{
        overflow: auto;
    }

    #sidebar{
        #menu-container{
            overflow-y: auto;
            overflow-x: hidden;
            height: 100%;
        }
        #admin-info-container{
        img{
            border: black 2px solid;

        }}
    .accordion-item{
        border: black 1px solid;
    .child-accordion-item{
        border: black 1px solid;
    }
    .nav-link{
        border: black 1px solid;
    }}
    }
</style>