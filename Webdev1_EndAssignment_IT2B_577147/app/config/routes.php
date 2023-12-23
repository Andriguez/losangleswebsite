<?php
require_once __DIR__.'/../config/Route.php';
$routes = [
    new Route(['GET','HEAD'],'connectController', null,'/^\/feed(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'homeController', null,null, '/'),
    new Route(['GET','HEAD'],'artistsController',  null,'/^\/artists(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'eventsController',  null,'/^\/events(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'aboutController',  null,'/^\/about(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'loginController',  null,null,'/login'),
    new Route(['POST'],'loginController',  'access',null, '/login/access'),
    new Route(['GET'],'loginController',  'logOut',null, '/logout'),
    new Route(['GET','HEAD'],'registerController',  null,'/^\/register(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'adminController',  null,'/^\/admin(?:\/([a-z0-1_-]+))?$/'),
    new Route(['GET','HEAD'],'adminController',  'navbarLogo',null,'/admin/navbar/logo'),
    new Route(['GET','HEAD'],'trialController',  null,'/^\/trial(?:\/([a-z0-1_-]+))?$/'),
];