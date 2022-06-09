<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/ReservationRoom.php';
require_once dirname(__FILE__) . '/../models/Room.php';
require_once dirname(__FILE__) . '/../models/Reservation.php';

class ReservationsController
{
    public function show()
    {
        if (!isset($_SESSION["id"])) {
            $_SESSION["id"] = 1;
        }
        $user_reservations = Reservation::user_reservations($_SESSION["id"]);
        return ($user_reservations);
    }

    public function get_reservations()
    {
        $reservations = Reservation::all();
        return ($reservations);
    }
    public function showDetails()
    {
        $user_reservations = Reservation::find($_GET["id"]);
        return ($user_reservations);
    }
    public function add_reservation()
    {
        if (isset($_POST["submit"])) {

            // template to enter in reservation database after choosing steps 


            $user_id = $_SESSION["id"];
            $start_date = date('Y-m-d', strtotime($_POST['birth_date']));
            $end_date = date('Y-m-d', strtotime($_POST['birth_date']));
            $name = $_SESSION["name"];

            $reservation = new Reservation();


            $reservation->data["user_id"] = $user_id;
            $reservation->data["start_date"] = $start_date;
            $reservation->data["end_date"] = $end_date;
            $reservation->data["status"]  = 3;        //status=3 means pending
            $reservation->data["username"] = $name;


            if ($reservation->save()) {
                return true;
            }
            return false;
        }
    }
}
