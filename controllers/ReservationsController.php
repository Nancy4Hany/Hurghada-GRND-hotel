<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/Reservation.php';

class ReservationsController
{
    public function show()
    {
        $user_reservations = Reservation::user_reservations($_SESSION["id"]);
        return($user_reservations);
    }
    public function showDetails()
    {
        $user_reservations = Reservation::find($_GET["id"]);
        return($user_reservations);
    }
}


?>