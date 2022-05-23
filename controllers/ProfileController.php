<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/User.php';

class ProfileController
{
    public function showData()
    {
        $user_data = User::find($_SESSION["id"]);
        return($user_data);
    }
}

?>