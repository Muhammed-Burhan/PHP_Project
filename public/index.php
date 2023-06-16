<?php 

use Core\Router;

const BASE_PATH=__DIR__.'/../';


require BASE_PATH.'Core/functions.php';

spl_autoload_register(function($class)
{
    $class=str_replace('\\','/',$class);
    require base_path("{$class}.php");
});


$router=new Router();


require base_path('Core/bootstrap.php');


require base_path('routes.php');
$uri=parse_url($_SERVER['REQUEST_URI'])['path'];

$method=$_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

echo $method;

$router->route($uri,$method);


?>