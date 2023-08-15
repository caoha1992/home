<?php

$router->post('/','index.php')->only('auth');
$router->get('/about','about.php');
$router->get('/contact','contact.php');


$router->get('/register','register/create.php')->only('guest');
$router->post('/register','register/store.php')->only('guest');

$router->get('/login','session/index.php')->only('guest');
$router->post('/login','session/store.php')->only('guest');

$router->post('/logout','session/destroy.php')->only('auth');


$router->get('/middleware','Core/Middleware/Middleware.php')->only('guest');

