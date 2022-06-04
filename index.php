<?php

declare(strict_types = 1);

require_once 'App\\Router.php';
require_once 'App\\Controllers\\MainController.php';

use App\Router;
use App\Controllers\Main;

try{
    $router = new Router();

    $router ->register('/work/',  [Main::class, 'index']);

    $router->resolve($_SERVER['REQUEST_URI']);

}catch(Exception $e){
    echo "<br>Error! " . $e->getMessage();
}