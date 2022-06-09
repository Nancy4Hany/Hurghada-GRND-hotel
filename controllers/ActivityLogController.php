<?php
require_once dirname(__FILE__) . '/../models/ActivityLog.php';


class ActivityLogController{

public function makelog($action,$description){
$user_id=$_SESSION['id'];


$Activity_Log=new ActivityLog();

$Activity_Log->data["user_id"]=$user_id;
$Activity_Log->data["action"]=$action;
$Activity_Log->data["description"] = $description;

}

}
?>