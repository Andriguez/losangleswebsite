<?php if (session_status() == PHP_SESSION_NONE) {
session_start();} ?>
<html>
<head>
    <title>Admin page</title>
    <link rel="icon" href="/media/logosonlytb.png" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/style/admin/adminstyle.css">

</head>
<body>
<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 250px; height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-reset text-decoration-none">
        <img src="/media/logos/logo-notriangle.jpg" id="logo" width="60" height="40">
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
                                            <li><a onClick="openWindow('managehomepagepicture')" class="nav-link text-reset">Main Picture</a></li>
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
                            <li><a class="nav-link text-reset" onclick="openWindow('viewapplications')">manage applications</a></li>
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
                            <li><a onclick="openWindow('viewposts')" class="nav-link text-reset">posts</a></li>
                        </ul>
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
            <img src=" <?php echo $loggedAdmin->getPictureSrc() ?? '';?>" alt="" width="40" height="40" class="ms-3 me-2">
        <div id="info-text">
            <strong> <?php echo $loggedAdmin->getFullName() ?? 'Admin name';?></strong>
            <a href="/logout">logout</a>
        </div>
    </div>
</div>
<div id="main-window" style="flex-grow: 1; padding: 20px;">
    <div style="margin: 50px;" id="main-window-content">
        <img src="/media/icons/charlies-angles.svg">
        <span>"Good Morning, Angles"</span>
    </div>
</div>
<script src="/js/admin/adminscript.js"></script>
</body>
</html>