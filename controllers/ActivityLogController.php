<?php
require_once dirname(__FILE__) . '/../models/Activity_Log.php';


class ActivityLogController{

public function makelog($action,$description){
$user_id=$_SESSION['id'];


$Activity_Log=new Activity_Log();

$Activity_Log->data["user_id"]=$user_id;
$Activity_Log->data["action"]=$action;
$Activity_Log->data["description"] = $description;

}

}
?>