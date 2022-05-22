<?php
foreach (glob(dirname(__FILE__) . '/../../models/*.php') as $file) {
    require_once $file;
}
class API{
    public static function all(){
        $instance = new static();
        $class = get_class($instance);
        $class = str_replace('API','',$class);
        $items = $class::all();
        echo json_encode($items);
    }

    public static function find()
    {
        if (!isset($_GET['id'])) {
            echo json_encode(["error" => 'id required']);
            exit();
        }

        $instance = new static();
        $class = get_class($instance);
        $class = str_replace('API', '', $class);

        $id = $_GET['id'];
        $item = $class::find($id);
        echo json_encode($item->data);
    }
}