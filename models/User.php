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

    public function getType(){
        $query = "SELECT t.name from users u , user_types t where u.user_type_id=t.id AND u.id=:id";
        return DB::query($query,array(":id"=>$this->data['id']))[0]["name"];
    }



  public static function findbyemail ($email){
        $instance = new static();
        $table = $instance->table;
        $data = DB::query("SELECT * FROM $table WHERE email=:email", array(':email' => $email));
        
        if($data)
        {
            $instance->data = $data[0];
            $instance->data = array_filter($instance->data, function($key) use ($instance) { 
                return (gettype($key) != 'integer' && !in_array($key, $instance->hidden) ); 
            }, ARRAY_FILTER_USE_KEY);
        }else{
            return false;
        }
        return $instance;
    }
}