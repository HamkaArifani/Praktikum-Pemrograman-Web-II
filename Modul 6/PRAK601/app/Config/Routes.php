<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'PagesController::Home');
$routes->get('profil', 'PagesController::Profile');
