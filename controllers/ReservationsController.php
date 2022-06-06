<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/ReservationRoom.php';
require_once dirname(__FILE__).'/../models/Room.php';
require_once dirname(__FILE__).'/../models/Reservation.php';

class ReservationsController
{
    public function show()
    {
        if(!isset($_SESSION["id"])){
            $_SESSION["id"] = 1;
        }
        $user_reservations = Reservation::user_reservations($_SESSION["id"]);
        return($user_reservations);
    }

    public function get_reservations(){
        $reservations = Reservation::all();
        return($reservations);
    }
    public function showDetails()
    {
        $user_reservations = Reservation::find($_GET["id"]);
        return($user_reservations);
    }

  
}


?>