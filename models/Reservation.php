<?php
require_once dirname(__FILE__) . '/Model.php';

class Reservation extends Model
{
    protected $table = "reservations";
    public $data;


    public static function all()
    {
        $instance = new self();
        $table = $instance->table;
        $reservations = DB::query("SELECT  r.*, u.name as user_name, uu.name as receptionist_name FROM $table r, users u, users uu WHERE u.id=r.user_id AND uu.id=r.checked_in_by");
        $reservations = array_map(function ($array) {
            $reservation_rooms = DB::query('SELECT rr.*, r.name as room_name FROM reservation_rooms rr, rooms r WHERE rr.room_id = r.id AND reservation_id=:reservation_id', array(':reservation_id' => $array["id"]));
            $reservation_rooms = array_map(function ($array2) {
                return array_filter($array2, function ($key) {
                    return gettype($key) != "integer";
                }, ARRAY_FILTER_USE_KEY);
            }, $reservation_rooms);
            $array["rooms"] = $reservation_rooms;

            return array_filter($array, function ($key) {
                return gettype($key) != "integer";
            }, ARRAY_FILTER_USE_KEY);
        }, $reservations);

        return $reservations;
    }

    public static function find($id)
    {
        $instance = new static();
        $table = $instance->table;
        $data = DB::query("SELECT r.*, u.name as user_name FROM $table r, users u WHERE r.id=:id AND u.id=r.user_id", array(':id' => $id));
        if ($data) {
            $instance->data = $data[0];
            $instance->data = array_filter($instance->data, function ($key) use ($instance) {
                return (gettype($key) != 'integer' && !in_array($key, $instance->hidden));
            }, ARRAY_FILTER_USE_KEY);
            $reservation_rooms = DB::query('SELECT rr.*, r.name as room_name FROM reservation_rooms rr, rooms r WHERE rr.room_id = r.id AND reservation_id=:reservation_id', array(':reservation_id' => $instance->data["id"]));
            $reservation_rooms = array_map(function ($array) {
                return array_filter($array, function ($key) {
                    return gettype($key) != "integer";
                }, ARRAY_FILTER_USE_KEY);
            }, $reservation_rooms);
            $instance->data["rooms"] = $reservation_rooms;
        }else{
            return false;
        }
        return $instance;
    }

    public static function user_reservations($id){
        $instance = new self();
        $table = $instance->table;
        $reservations = DB::query("SELECT * FROM $table WHERE user_id=:user_id",array(':user_id'=>$id));
        $reservations = array_map(function ($array) {
            $reservation_rooms = DB::query('SELECT rr.*, r.name as room_name FROM reservation_rooms rr, rooms r WHERE rr.room_id = r.id AND reservation_id=:reservation_id', array(':reservation_id' => $array["id"]));
            $reservation_rooms = array_map(function ($array2) {
                return array_filter($array2, function ($key) {
                    return gettype($key) != "integer";
                }, ARRAY_FILTER_USE_KEY);
            }, $reservation_rooms);
            $array["rooms"] = $reservation_rooms;

            return array_filter($array, function ($key) {
                return gettype($key) != "integer";
            }, ARRAY_FILTER_USE_KEY);
        }, $reservations);

        return $reservations;
    }
    public static function reservation_details($id)
    {
        $instance = new self();
        $table = $instance->table;
        $reservations = DB::query("SELECT * FROM $table WHERE user_id=:user_id",array(':user_id'=>$id));
        $reservations = array_map(function ($array) {
            $reservation_rooms = DB::query('SELECT rr.*, r.name as room_name FROM reservation_rooms rr, rooms r WHERE rr.room_id = r.id AND reservation_id=:reservation_id', array(':reservation_id' => $array["id"]));
            $reservation_rooms = array_map(function ($array2) {
                return array_filter($array2, function ($key) {
                    return gettype($key) != "integer";
                }, ARRAY_FILTER_USE_KEY);
            }, $reservation_rooms);
            $array["rooms"] = $reservation_rooms;

            return array_filter($array, function ($key) {
                return gettype($key) != "integer";
            }, ARRAY_FILTER_USE_KEY);
        }, $reservations);

        return $reservations;
    }


}
