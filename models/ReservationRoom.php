<?php

require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/../controllers/ReservationsController.php';
class ReservationRoom extends Model
{
  protected $table = "reservation_rooms";

  public static function find_by_reservation_id($reservation_id)
  {
    $instance = new self();
    $table = $instance->table;
    $values = DB::query("SELECT * FROM $table WHERE reservation_id = :reservation_id", array(":reservation_id" => $reservation_id));
    $values = array_map(function ($array) {
      return array_filter($array, function ($key) {
        return gettype($key) != "integer";
      }, ARRAY_FILTER_USE_KEY);
    }, $values);
    return $values;
  }

  //implement ReservationRoom::delete_all_rooms_from_reservation($reservation_id)
  public static function delete_all_rooms_from_reservation($reservation_id)
  {
    $instance = new self();
    $table = $instance->table;
    DB::query("DELETE FROM $table WHERE reservation_id = :reservation_id", array(":reservation_id" => $reservation_id));
    return true;
  }
  
    
}