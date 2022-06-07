<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__). '/ReservationRoom.php';
require_once dirname(__FILE__) . '/Reservation.php';

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
  
    
    
    public static function all(){
        $instance = new self();
        $table = $instance->table;
        $values = DB::query("SELECT r.*, t.name as room_type_name FROM $table r, room_types t WHERE t.id = r.room_type_id");
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }
<<<<<<< HEAD

    // function to find available rooms 
    public static function find_available($start_date, $end_date)
    {
        $instance = new static();
        $query = " SELECT * FROM rooms WHERE id NOT IN(SELECT room_id FROM reservation_rooms LEFT JOIN reservations ON reservations.id = reservation_rooms.reservation_id WHERE :start_date <= end_date AND :end_date >= start_date )";
        
        $rooms = DB::query($query, array(":start_date" => $start_date, ":end_date" => $end_date));
        $data = array_map(function ($array) use ($instance) {
            return array_filter($array, function ($key) use ($instance) {
                return gettype($key) != "integer" && !in_array($key, $instance->hidden);
            }, ARRAY_FILTER_USE_KEY);
        }, $rooms);
        
        return $rooms; // returns rooms available  when the function gets called
    }
    
=======
    
    public  static function allByType($type){
        $instance = new self();
        $table = $instance->table;
        $values = DB::query("SELECT r.*, t.name as room_type_name FROM $table r, room_types t WHERE t.id = r.room_type_id AND t.id=:id",array(':id'=>$type));
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }
>>>>>>> 996f89fc8bd0ac9b491d9e7e84006fb34c15600b

}