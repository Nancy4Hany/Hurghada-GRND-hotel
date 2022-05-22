<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/Room.php';

class RoomsController{
    public function add_room()
    {
        if (isset($_POST["submit"])) {
            $validation_message = "";
            if(!isset($_POST['name']) || empty($_POST['name'])){
                $validation_message .= "Please enter a valid name\n";
            }
            if (!isset($_POST['number']) || empty($_POST['number'])) {
                $validation_message .= "Please enter a valid number\n";
            }

            if($validation_message != ""){
                return $validation_message;
            }
            $room_name = $_POST['name'];
            $room_number = $_POST['number'];
            $room_price = $_POST['price'];
            $room_type_id = $_POST['type_id'];


            $room_is_sea_view = isset($_POST['is_sea_view'])?1:0;
            if(isset($_POST['id'])){
                $room = Room::find($_POST["id"]);
                $room->data["name"] = $room_name;
                $room->data["number"] = $room_number;
                $room->data["price"] = $room_price;
                $room->data["room_type_id"] = $room_type_id;
                $room->data["is_sea_view"] = $room_is_sea_view;
            }else{
                $room =  Room::create([
                    "name" => $room_name,
                    "number" => $room_number,
                    "price" => $room_price,
                    "room_type_id" => $room_type_id,
                    "is_sea_view" => $room_is_sea_view,
                ]);
            }
            
            if($room->save()){
                return true;
            }
        }
        return false;
    }

    public function delete_room()
    {
        // if(isset($_POST["submit"]))

        
    }
}