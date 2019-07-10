<?php

/**
 * you can register either post or get request types
 * $router->get('uri','ControllerName->method')
 * $router->post('uri','ControllerName->method')
 */
$router->get('', 'PagesController->home');
$router->get('index.php', 'PagesController->home');
$router->get('home', 'PagesController->home');
$router->get('about', 'PagesController->about');
$router->get('contact', 'PagesController->contact');
