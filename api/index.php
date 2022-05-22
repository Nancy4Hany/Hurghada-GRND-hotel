<?php
foreach (glob(dirname(__FILE__) . '/../controllers/API/*.php') as $file) {
    require_once $file;
}

$route = explode('/', $_SERVER['REQUEST_URI']);
$function =  end($route);
$class = array_slice($route, -2, 1)[0];
$class = ucwords($class,'_')."API";
$class = str_replace('_','',$class);
$function = explode("?", $function)[0];
if(!method_exists($class, $function)){
    http_response_code(404);
    include dirname(__FILE__).'/../includes/404.html';
    exit();
}
header('Content-Type: application/json; charset=utf-8');

$api = $class::{$function}();