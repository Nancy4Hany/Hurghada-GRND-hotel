<?php

foreach (glob(dirname(__FILE__) . '/../models/*.php') as $file) {
    require_once $file;
}
if(!isset($_GET['id']) || !isset($_GET['type'])){
    die('Bad Request!');
}
$id = $_GET['id'];
$type = $_GET['type'];

$type = Helper::snake2camel($type);

$instance = $type::find($id);

if(!$instance){
    die('Not Found!');
}
if($type == 'Reservation'){
    if(!isset($_GET['pin'])){
        $_SESSION["error"] = "Please provide a PIN code";
    }
    $pin = $_GET['pin'];
    if($pin != "4444"){
        $_SESSION["error"] = "Wrong PIN code";
    }
}
if(isset($_SESSION["error"])){
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
$instance->delete();

header('Location: '. $_SERVER['HTTP_REFERER']);

?>