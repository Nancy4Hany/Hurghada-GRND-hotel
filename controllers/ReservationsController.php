<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/ReservationRoom.php';
require_once dirname(__FILE__).'/../models/Room.php';
require_once dirname(__FILE__). '/../models/Reservation.php';
require_once dirname(__FILE__) . '/../models/ActivityLog.php';
require_once dirname(__FILE__).'/API/ReservationAPI.php';
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

    public function create()
    {
        if(!isset($_SESSION["id"])){
            $_SESSION["id"] = 1;
        }
        if(isset($_POST['submit'])){
            if(isset($_POST["reservation_id"])){
                $reservation = Reservation::find($_POST["reservation_id"]);
            }
            else{
                $reservation = new Reservation();
            }
            $reservation->data["user_id"] = $_SESSION["id"];
            $daterange = explode("-", $_POST["daterange"]);
            $start_date = date("Y-m-d", strtotime($daterange[0]));
            $end_date = date("Y-m-d", strtotime($daterange[1]));
            $reservation->data["start_date"] = $start_date;
            $reservation->data["end_date"] = $end_date;
            unset($reservation->data["user_name"]);
            unset($reservation->data["rooms"]);
            if (!isset($_POST["reservation_id"])) {
                $reservation->data["created_at"] = date('Y-m-d H:i:s');
            }
            $reservation->data["updated_at"] = date('Y-m-d H:i:s');
            $reservation->save();
            $reservation_id = $reservation->data["id"];
            $rooms = $_POST["selected_rooms"];
            $rooms = explode(" ", $rooms);
            //if reservation_id isset then delete all rooms from reservation
            if(isset($_POST["reservation_id"])){
                ReservationRoom::delete_all_rooms_from_reservation($_POST["reservation_id"]);
            }
            foreach($rooms as $room){
                $reservation_room = new ReservationRoom();
                $reservation_room->data["reservation_id"] = $reservation_id;
                $reservation_room->data["room_id"] = $room;
                $reservation_room->save();
            }

            $acitivity_log = new ActivityLog();
            $acitivity_log->data["user_id"] = $_SESSION["id"];
            if(isset($_POST["reservation_id"])){
                $acitivity_log->data["action"] = "Updated reservation";
                $description = "Updated reservation with id: " . $reservation_id;
            } else {
                $acitivity_log->data["action"] = "Created reservation";
                $description = "Created reservation id: " . $reservation_id;
            }
                $acitivity_log->data["description"] = $description;
            $acitivity_log->save();

            ReservationAPI::reservation_save();
            return $reservation->data["id"];
        }
        return false;
    }

    
}
