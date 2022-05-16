<?php
require_once __DIR__ .'/../vendor/autoload.php';

session_start();


$router = new AltoRouter();


$router->map ('GET', '/', ['controller' => '\App\Controller\MainController', 'method' => 'allTypes'], 'home-sans-param');

$router->map( 'GET', '/contact', ['controller' => '\App\Controller\MainController', 'method' => 'contactMethod'], 'contact');

$router->map( 'GET', '/home', ['controller' => '\App\Controller\MainController', 'method' => 'allTypes'], 'home',);

$router->map( 'GET', '/store', ['controller' => '\App\Controller\MainController', 'method' => 'storeMethod'], 'store',);

$router->map( 'GET', '/products', ['controller' =>'\App\Controller\MainController', 'method' => 'productsFindAllMethod'], 'products',);

$router->map( 'GET', '/product/[i:id]', ['controller' =>'\App\Controller\MainController', 'method' => 'getSingleProduct'], 'product',);

$router->map( 'GET', '/product/list', ['controller' =>'\App\Controller\MainController', 'method' => 'productList'], 'product-list',);

$router->map( 'GET', '/product-by-type/[i:id]', ['controller' =>'\App\Controller\MainController', 'method' => 'singleTypeProducts'], 'product-by-type',);

$router->map( 'GET', '/product/create', ['controller' =>'\App\Controller\MainController', 'method' => 'viewId'], 'product-create',);

$router->map( 'POST', '/product/create', ['controller' =>'\App\Controller\MainController', 'method' => 'create'], 'product-create-post',);

$router->map( 'GET', '/product/update/[i:id]', ['controller' =>'\App\Controller\MainController', 'method' => 'viewUpdate'], 'product-update',);

$router->map( 'POST', '/product/update/[i:id]', ['controller' =>'\App\Controller\MainController', 'method' => 'update'],'product-update-post',);

$router->map( 'GET', '/login', ['controller' =>'\App\Controller\UserController', 'method' => 'viewLogin'], 'login',);

$router->map( 'POST', '/login', ['controller' =>'\App\Controller\UserController', 'method' => 'login'], 'login-post',);

$router->map( 'GET', '/logout', ['controller' =>'\App\Controller\UserController', 'method' => 'logout'], 'logout',);

$router->map( 'POST', '/signup', ['controller' =>'\App\Controller\UserController', 'method' => 'add'], 'signup-post',);

$router->map( 'GET', '/signup', ['controller' =>'\App\Controller\UserController', 'method' => 'signupView'],'signup',);

$router->map( 'GET', '/user/list', ['controller' =>'\App\Controller\UserController', 'method' => 'userList'], 'user-list',);

$match = $router->match();
//dump($informationPourLaPage);


//! on a renommer les clés du tableau
//! car le htaccess nous donne le dernier paramètre de l'url avec le /
/* $tableauDesPages = [
    '/home' => [
        'method' => 'homeMethod'
    ],
    '/about' => [
        'method' => 'aboutMethod'
    ],

]; */

$dispatcher = new Dispatcher($match, '\App\Controller\ErrorController::err404');

if ($match !== false) {
    $dispatcher->setControllersArguments($match['name']);
}
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();
   
