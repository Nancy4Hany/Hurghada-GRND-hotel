<?php
require_once "API.php";
class RoomAPI extends API
{
    public static function get_rooms(){
        if($_SERVER['REQUEST_METHOD'] != "POST"){
            http_response_code(404);
            echo json_encode(["error" => $_SERVER['REQUEST_METHOD'] . " method not allowed!"]);
            exit();
        }
        $daterange = $_POST['daterange'];
        if(isset($_POST['reservation_id'])){
            $reservation_id = $_POST['reservation_id'];
        }
        $daterange = explode('-', $daterange);
        $start_date = date('Y-m-d', strtotime($daterange[0]));
        $end_date = date('Y-m-d', strtotime($daterange[1]));
        if(isset($_POST["room_type_id"])){
            $room_type_id = $_POST["room_type_id"];
            $rooms = Room::find_available( $start_date, $end_date, $room_type_id);
        }else
        {
            $rooms = Room::find_available($start_date, $end_date);
        }

        $rooms = array_map(function($value){
            $r = Room::find($value["id"]);
            $r_image = $r->getImages();
            $r_image = $r_image;
            if(isset($r_image[0])){
                $r_image = $r_image[0]["image"];
            }else{
                $r_image = "";
            }
            $r->data["image"] = $r_image;
            return $r->data;
        }, $rooms);
        echo json_encode($rooms);
    }
}