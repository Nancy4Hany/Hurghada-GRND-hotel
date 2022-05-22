<?php
require_once dirname(__FILE__) . '/../classes/DB.php';

class Model {
    public $data;
    protected $hidden = [];
    public static function find($id){
        $instance = new static();
        $table = $instance->table;
        $data = DB::query("SELECT * FROM $table WHERE id=:id", array(':id' => $id));
        if($data){
            $instance->data = $data[0];
            $instance->data = array_filter($instance->data, function($key) use ($instance) { 
                return (gettype($key) != 'integer' && !in_array($key, $instance->hidden) ); 
            }, ARRAY_FILTER_USE_KEY);
        }
        return $instance;
    }

    public static function create($data)
    {
        $instance = new static();
        $instance->data = $data;
        return $instance;
    }

    public function save()
    {
        $keys = array_keys($this->data);
        $values = array_values($this->data);

        $keys_parameters = array_map(function($value) { return "?"; }, $keys);
        $keys_parameters_string = implode(',', $keys_parameters);
        $keys_string = array_map(function($value) { return "'".$value."'"; }, $keys);

        $keys_string = implode(',',$keys);
        if (isset($this->data["id"])) {
            $sql = "UPDATE {$this->table} SET ";
            for($i=0; $i<count($this->data);$i++){
                if(gettype($keys[$i]) == "integer"){
                    continue;
                }
                if($i != 0){
                    $sql .= ", ";
                }
                $sql .= $keys[$i]."="."? ";
            }
            $sql .= " WHERE id=". $this->data["id"];
            DB::query($sql,$values);
        }else{
            DB::query("INSERT INTO {$this->table}($keys_string) VALUES($keys_parameters_string)", $values);
        }
        return true;
    }

    public function delete(){
        if(isset($this->data["id"])){
            DB::query("DELETE FROM {$this->table} WHERE id=:id", array(':id'=>$this->data["id"]));
        }
    }

    public static function all()
    {
        $instance = new static();
        $table = $instance->table;
        $values = DB::query("SELECT * FROM $table");
        $values = array_map(function ($array) {
            return array_filter($array, function ($key) {
                return gettype($key) != "integer";
            }, ARRAY_FILTER_USE_KEY);
        }, $values);
        return $values;
    }
}