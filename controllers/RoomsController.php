<?php
require_once dirname(__FILE__) . '/../models/Room.php';
require_once dirname(__FILE__) . '/../models/RoomPhoto.php';
require_once dirname(__FILE__) . '/../models/Reservation.php';
require_once dirname(__FILE__) . '/../models/ReservationRoom.php';

require_once dirname(__FILE__).'/../models/RoomType.php'; 
require_once dirname(__FILE__).'/../classes/DB.php';
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
                foreach($_FILES['image']["name"] as $key=>$val){
                    $directory = "uploads";
                    $target_directory = dirname(__FILE__).'/../'.$directory ;
                    $ext = @end((explode(".", $_FILES['image']["name"][$key])));
                    $file_name = time() . ".$ext";
                    $target_file = $target_directory . '/'. $file_name;
                    move_uploaded_file($_FILES["image"]["tmp_name"][$key], $target_file);
                    $room_photo = new RoomPhoto();
                    $room_photo->data["image"] = $directory.'/'.$file_name;
                    $room_photo->data["room_id"] = $room->data["id"];
                    $room_photo->save();
                }
                return true;
            }
        }
        return false;
    }
public function room_type()
{
    if(isset($_GET['rooms'])){
        $type=$_GET['rooms'];
        $rooms = Room::allByType($type);
        return $rooms;
    }
    return false;
}
    public function delete_room()
    {
        // if(isset($_POST["submit"]))

        
    }
    public function find_available()
    {

        if (isset($_POST["submit"])) {
            //FOR TESTING

            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $rooms = Room::find_available($start_date,$end_date);
            return $rooms;
        }
        return false;
    }

    public function showDetails()
    {   
        $rooms = Room::find(2);
        return($rooms);
    }

  
}