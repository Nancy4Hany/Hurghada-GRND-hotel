<?php
foreach (glob(dirname(__FILE__) . '/../models/*.php') as $file) {
    require_once $file;
}
if(!isset($_GET['id']) || !isset($_GET['type'])){
    die('Bad Request!');
}
$id = $_GET['id'];
$type = $_GET['type'];

$type = str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));

$instance = $type::find($id);

$instance->delete();

header('Location: '. $_SERVER['HTTP_REFERER']);

?>