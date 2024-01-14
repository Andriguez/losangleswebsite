<?php if (session_status() == PHP_SESSION_NONE) {
session_start();} ?>
<html>
<head>
    <title>Admin page</title>
    <link rel="icon" href="/media/onlytb.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/style/adminstyle.css">

</head>
<body>
<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px; height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-reset text-decoration-none">
        <img src="/media/onlytb.png" id="logo" width="60" height="40">
        <span class="fs-4">Los Angles <label>backstage</label></span>
    </a>
    <hr>
    <div id="menu-container">
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
                            <!--CHiLD ACCORDION HOME-PAGE-->
                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-home-flush-collapse" aria-expanded="false" aria-controls="content-home-flush-collapse">
                                        Home Page
                                    </button>
                                </h2>
                                <div id="content-home-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION HOME-PAGE OPTIONS-->
                                        <ul class="nav nav-pills flex-column mb-auto">
                                            <li><a onClick="openWindow('managehomepagelogo')" class="nav-link text-reset">Logo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--CHiLD ACCORDION ARTISTS-PAGE-->
                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-artist-flush-collapse" aria-expanded="false" aria-controls="content-artist-flush-collapse">
                                        Artists Page
                                    </button>
                                </h2>
                                <div id="content-artist-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION ARTISTS-PAGE OPTIONS-->
                                        <ul class="nav nav-pills flex-column mb-auto">
                                            <li><a onclick="openWindow('manageartistdetails')" class="nav-link text-reset">artists details</a></li>
                                            <li><a onclick="openWindow('viewdisciplines')" class="nav-link text-reset">disciplines</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--CHiLD ACCORDION EVENTS-PAGE-->
                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-events-flush-collapse" aria-expanded="false" aria-controls="content-events-flush-collapse">
                                        Events Page
                                    </button>
                                </h2>
                                <div id="content-events-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION EVENTS-PAGE OPTIONS-->
                                        <ul class="nav nav-pills flex-column mb-auto">
                                            <li><a onclick="openWindow('viewevents')" class="nav-link text-reset">events</a></li>
                                            <li><a onclick="openWindow('viewlineups')" class="nav-link text-reset">Lineups</a></li>
                                            <li><a onclick="openWindow('viewlocations')" class="nav-link text-reset">locations</a></li>
                                            <li><a class="nav-link text-reset" onclick="openWindow('vieweventtypes')">types</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--CHiLD ACCORDION ABOUT-PAGE-->
                            <div class="child-accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-about-flush-collapse" aria-expanded="false" aria-controls="content-about-flush-collapse">
                                        About Page
                                    </button>
                                </h2>
                                <div id="content-about-flush-collapse" class="accordion-collapse collapse" data-bs-parent="#content-child-accordion">
                                    <div class="accordion-body">
                                        <!--CHiLD ACCORDION ABOUT-PAGE OPTIONS-->
                                        <ul class="nav nav-pills flex-column mb-auto">
                                            <li><a onclick="openWindow('managedescription')" class="nav-link text-reset">about details</a></li>
                                            <li><a onclick="openWindow('manageadmindetails')" class="nav-link text-reset">admin details</a></li>
                                        </ul>
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
                        <!--USERS CHILD OPTIONS-->
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li><a onclick="openWindow('viewusers')" class="nav-link text-reset">users</a></li>
                            <!--<li><a onclick="openWindow('managecollaboratordetails')" class="nav-link text-reset">collaborator details</a></li>-->
                        </ul>
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
                        <!--APPLICATIONS CHILD OPTIONS-->
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li><a href="#" class="nav-link text-reset" onclick="openWindow('viewapplications')">manage applications</a></li>
                        </ul>
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
                        <!--FEED CHILD OPTIONS-->
                        <ul class="nav nav-pills flex-column mb-auto">
                            <li><a onclick="openWindow('viewtopics')" class="nav-link text-reset">topics</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <div id="admin-info-container">
            <img src="/media/artist1.png" alt="" width="40" height="40" class="ms-3 me-2">
        <div id="info-text">
            <strong><?php echo (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 'admin name';?></strong>
            <a href="/logout">logout</a>
        </div>
    </div>
</div>
<div id="main-window" style="flex-grow: 1; padding: 20px;">
    <div id="main-window-content">
    <img src="/media/charlies-angles.svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
            <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"/>
        </svg>
    <span>Good Morning, Angles</span>
        <svg id="closinq" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
            <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1z"/>
        </svg>
    </div>
</div>
<script src="/js/adminscript.js"></script>
</body>
</html>