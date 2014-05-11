<?php

// Get environment & autoloader, the $di & $app-object.
require __DIR__.'/config_with_app.php';

// Services
$di->setShared('flash', function() {
    $flash = new \kalkih\Flash\Flash();
    return $flash;
});

// Other services, modules, controllers here

// Starts the session (required by the Flashy class)
$app->session;

// Extra stylesheet
$app->theme->addStylesheet('css/flashy.css');

// Routes
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Flash test");

    $app->session;

    $app->flash->add('info', 'This is a info message');
    $app->flash->add('success', 'This is a success message');
    $app->flash->add('warning', 'This is a warning message');
    $app->flash->add('error', 'This is a error message');

    $app->theme->setVariable('title', "Flashy Test")
           ->setVariable('main', $app->flash->get());
 
});

$app->router->handle();
$app->theme->render();
