<?php
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/UserType.php';

class User extends Model
{
    protected $table = "users";
    protected $hidden = ["password"];
    public $data;
    public static function all()
    {
        $instance = new self();
        $table = $instance->table;
        $values =  DB::query("SELECT u.*, t.name as user_type_name FROM $table u, user_types t WHERE t.id = u.user_type_id");
        $values = array_map(function ($array) {
            return array_filter($array, function ($key) {
                return gettype($key) != "integer";
            }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }

    public static function all_receptionists()
    {
        $instance = new self();
        $table = $instance->table;
        return DB::query("SELECT u.*, t.name as user_type_name FROM $table u, user_types t WHERE t.id = u.user_type_id AND t.name='receptionist'");
    }

    public static function login($email, $password){
        $instance = new self();
        $table = $instance->table;
        $check = DB::query("SELECT id FROM {$table} WHERE email=:email AND password=:password",array(':email'=>$email, ':password'=>$password));
        if($check){
            return $check[0]["id"];
        }
        return false;
    }

    public function getType()
    {
        $user = $this;
        $user_type = UserType::find($user->data["id"]);
        return $user_type->data["name"];
    }

    public static function findbyemail($email)
    {
        $instance = new static();
        $table = $instance->table;
        $data = DB::query("SELECT * FROM $table WHERE email=:email", array(':email' => $email));

        if ($data) {
            $instance->data = $data[0];
            $instance->data = array_filter($instance->data, function ($key) use ($instance) {
                return (gettype($key) != 'integer' && !in_array($key, $instance->hidden));
            }, ARRAY_FILTER_USE_KEY);
        } else {
            return false;
        }
        return $instance;
    }
    
    public function getPassword()
    {
        $user = $this;
        $password = DB::query("SELECT password FROM users WHERE id=:id", array(':id' => $user->data["id"]));
        return $password[0]["password"];
    }
 
}
