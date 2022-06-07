<?php
require_once dirname(__FILE__) . '/Model.php';

class User extends Model{
    protected $table = "users";
    protected $hidden = ["password"];
    public $data;
    public static function all(){
        $instance = new self();
        $table = $instance->table;
        $values =  DB::query("SELECT u.*, t.name as user_type_name FROM $table u, user_types t WHERE t.id = u.user_type_id");
        $values = array_map(function($array){
            return array_filter($array, function($key) { return gettype($key) != "integer"; }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }

    public static function all_receptionists(){
        $instance = new self();
        $table = $instance->table;
        return DB::query("SELECT u.*, t.name as user_type_name FROM $table u, user_types t WHERE t.id = u.user_type_id AND t.name='receptionist'");
    }




}