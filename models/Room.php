<?php
require_once dirname(__FILE__) . '/Model.php';

class Room extends Model{
    protected $table = "rooms";
    public $data;
    function __construct()
    {
    }
    public static function all(){
        $instance = new self();
        $table = $instance->table;
        $values = DB::query("SELECT r.*, t.name as room_type_name FROM $table r, room_types t WHERE t.id = r.room_type_id");
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }
    
    

}