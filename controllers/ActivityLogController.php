<?php
require_once dirname(__FILE__) . '/../models/ActivityLog.php';
require_once dirname(__FILE__) . '/../classes/DB.php';

class ActivityLogController{

public static function makelog($action,$description,$id){
  $a=$action;
  $b=$description;
  $c=$id;
    
// $user_id=$_SESSION['id'];


$ActivityLog=new ActivityLog();

$ActivityLog->data["user_id"]=$c;
$ActivityLog->data["action"]=$a;
$ActivityLog->data["description"] = $b;
        if ($ActivityLog->save()) {
           
            return true;
            
        }return false;
}




}


?>