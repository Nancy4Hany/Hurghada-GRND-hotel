<?php
require_once "API.php";
class ReservationAPI extends API{
   
    public static function create()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            http_response_code(404);
            echo json_encode(["error" => $_SERVER['REQUEST_METHOD'] . " method not allowed!"]);
            exit();
        }
        $validation = ['user_id', 'start_date', 'end_date'];
        foreach ($validation as $v) {
            if (!isset($_POST[$v])) {
                echo json_encode(["error" => $v . " is required"]);
                exit();
            }
        }
        $user_id = $_POST['user_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST["end_date"];

        $status = 0;
        if (isset($_POST['id'])) {
            $reservation = Reservation::find($_POST["id"]);
        } else {
            $reservation = new Reservation();
            $reservation->data["created_at"] = date('Y-m-d H:i:s');
        }
        $reservation->data["user_id"] = $user_id;
        $reservation->data["start_date"] = $start_date;
        $reservation->data["end_date"] = $end_date;
        $reservation->data["status"] = $status;
        $reservation->data["updated_at"] = date('Y-m-d H:i:s');
        $reservation->save();
        echo json_encode($reservation->data);
    }


    public static function add_room_to_reservation()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            http_response_code(404);
            echo json_encode(["error" => $_SERVER['REQUEST_METHOD'] . " method not allowed!"]);
            exit();
        }
        $validation = ['reservation_id', 'room_id', 'quantity_of_guests'];
        foreach ($validation as $v) {
            if (!isset($_POST[$v])) {
                echo json_encode(["error" => $v . " is required"]);
                exit();
            }
        }
        $reservation_id = $_POST['reservation_id'];
        $room_id = $_POST['room_id'];
        $quantity_of_guests = $_POST["quantity_of_guests"];

        $status = 0;
        if (isset($_POST['id'])) {
            $reservation = ReservationRoom::find($_POST["id"]);
        } else {
            $reservation = new ReservationRoom();
        }
        $reservation->data["reservation_id"] = $reservation_id;
        $reservation->data["room_id"] = $room_id;
        $reservation->data["quantity_of_guests"] = $quantity_of_guests;
        $reservation->save();
        echo json_encode($reservation->data);
    }
}