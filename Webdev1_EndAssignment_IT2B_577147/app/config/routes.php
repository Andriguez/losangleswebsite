<?php
require_once __DIR__.'/../config/Route.php';
$routes = [
    new Route(['GET','HEAD'],'connectController', null,'/^\/feed(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'homeController', null,null, '/'),
    new Route(['GET','HEAD'],'artistsController',  null,'/^\/artists(?:\/(?:|index))?\/?#?$/i', '/artists'),
    new Route(['GET','HEAD'],'artistsController',  'displayRequest','/^\/artists(?:\/([a-z0-9_-]+)(?:\/(\w+))?)?\/?$/i'),
    new Route(['GET','HEAD'],'eventsController',  null,'/^\/events(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'aboutController',  null,'/^\/about(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'loginController',  null,null,'/login'),
    new Route(['POST'],'loginController',  'access',null, '/login/access'),
    new Route(['GET'],'loginController',  'logOut',null, '/logout'),
    new Route(['GET','HEAD'],'registerController',  null,'/^\/register(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD', 'POST'],'adminController',  null,'/^\/admin(?:\/([a-z0-9_-]+)(?:\/(\w+))?)?\/?#?$/i'),
                                                                                ///^\/admin(?:\/([a-z0-9_-]+)(?:\/(\w+))?)?\/?$/i
    //new Route(['GET','HEAD'],'adminController',  'manageHomepageLogo',null, $pattern = '/^\/admin(?:\/(index|.+))?$/i';'/admin/homepage/logo') ,
    //new Route(['GET','HEAD'],'adminController',  'manageArtistDetails',null,'/admin/artists/details'),

    new Route(['GET','HEAD'],'trialController',  null,'/^\/trial(?:\/([a-z0-1_-]+))?$/'),

];