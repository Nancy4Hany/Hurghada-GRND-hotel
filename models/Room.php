<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__). '/ReservationRoom.php';
require_once dirname(__FILE__) . '/Reservation.php';
require_once dirname(__FILE__) . '/RoomPhoto.php';
class Room extends Model{
    protected $table = "rooms";
    public $data;
    function __construct()
    {
    }
    // SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM reservation_rooms LEFT JOIN reservations ON reservations.id = reservation_rooms.reservation_id WHERE '2022-03-07' <= end_date AND '2022-05-26' >= start_date )
    // public static function finddate()
    // { //start date

    //     // $instance = new self();
    //     // $table = $instance->table;
    //     // $query = "SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM reservation_rooms LEFT JOIN reservations ON reservations.id = reservation_rooms.reservation_id WHERE start_date=:start_date <= end_date AND end_date=:end_date >= start_date ";
    //     // $ifavailable = DB::query($query);

    //     // $ifavailable = array_map(function ($array) {
    //     //         return array_filter($array, function ($key) {
    //     //             return gettype($key) != "integer";
    //     //         }, ARRAY_FILTER_USE_KEY);
    //     //     }, $ifavailable);
    //     //     $array["rooms"] = $ifavailable;

    //     //     return array_filter($array, function ($key) {
    //     //         return gettype($key) != "integer";
    //     //     }, ARRAY_FILTER_USE_KEY);


    //     // return $ifavailable;
    // }
  
    public function getImages(){
        $table = $this->table;
        $values = DB::query("SELECT p.* FROM room_photos p  WHERE p.room_id = :id",array(":id"=>$this->data["id"]));
        $values = array_map(function ($array) {
            return array_filter($array, function ($key) {
                return gettype($key) != "integer";
            }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }
    
    public static function all(){
        $instance = new self();
        $table = $instance->table;
        $values = DB::query("SELECT r.*, t.name as room_type_name FROM  $table r, room_types t WHERE t.id = r.room_type_id");
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }
    public static function find($id){
        $instance = new self();
        $table = $instance->table;
        $data = DB::query("SELECT r.*, t.name as room_type_name, u.image as room_image FROM $table r, room_types t, room_photos u WHERE u.room_id = r.id AND t.id = r.room_type_id AND r.id = :id",array(":id"=>$id));
        if($data){
            $instance->data = $data[0];
            $instance->data = array_filter($instance->data, function($key) use ($instance) { 
                return (gettype($key) != 'integer' && !in_array($key, $instance->hidden) ); 
            }, ARRAY_FILTER_USE_KEY);
        }else{
            return false;
        }
        return $instance;
    }


    public static function find_available($start_date, $end_date, $room_type_id = null, $reservation_id = null)
    {
        $instance = new static();
        $table = $instance->table;
        if($room_type_id != null){
            $query = " SELECT * FROM rooms WHERE room_type_id=:room_type_id AND id NOT IN(SELECT room_id FROM reservation_rooms LEFT JOIN reservations ON reservations.id = reservation_rooms.reservation_id WHERE :start_date <= end_date AND :end_date >= start_date )";
            $rooms = DB::query($query, array(":start_date" => $start_date, ":end_date" => $end_date, ":room_type_id" => $room_type_id));
        }
        else{
            $query = " SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM reservation_rooms LEFT JOIN reservations ON reservations.id = reservation_rooms.reservation_id WHERE :start_date <= end_date AND :end_date >= start_date )";
            $rooms = DB::query($query, array(":start_date" => $start_date, ":end_date" => $end_date));
        }
        
        $data = array_map(function ($array) use ($instance) {
            return array_filter($array, function ($key) use ($instance) {
                return gettype($key) != "integer" && !in_array($key, $instance->hidden);
            }, ARRAY_FILTER_USE_KEY);
        }, $rooms);
        
        return $data;
    }
    
    public  static function allByType($type){
        $instance = new self();
        $table = $instance->table;
        $values = DB::query("SELECT r.*, t.name as room_type_name FROM $table r, room_types t WHERE t.id = r.room_type_id AND t.id=:id",array(':id'=>$type));
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }

    public static function homepage(){
        $instance = new self();
        $table = $instance->table;
        $values = DB::query("SELECT r.*, t.name as room_type_name t.price FROM $table r, room_types t WHERE t.id = r.room_type_id");
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }

}