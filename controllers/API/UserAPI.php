<?php
require_once "API.php";
class UserAPI extends API{
    
    public static function create()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            http_response_code(404);
            echo json_encode(["error" => $_SERVER['REQUEST_METHOD'] . " method not allowed!"]);
            exit();
        }
        $validation = ['name', 'email', 'password', 'national_id', 'birth_date', 'user_type_id'];
        foreach ($validation as $v) {
            if (!isset($_POST[$v])) {
                echo json_encode(["error" => $v . " is required"]);
                exit();
            }
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = "123456";
        // $password = $_POST['password'];
        $national_id = "xxxx";
        $birth_date = date('Y-m-d', strtotime($_POST['birth_date']));
        // $user_type_id = $_POST['user_type_id'];
        $user_type_id = 1;
        if (isset($_POST['id'])) {
            $user = User::find($_POST["id"]);
        } else {
            $user = new User();
        }
        $user->data["name"] = $name;
        $user->data["email"] = $email;
        $user->data["password"] = $password;
        $user->data["national_id"] = $national_id;
        $user->data["birth_date"] = $birth_date;
        $user->data["user_type_id"] = $user_type_id;
        $user->save();
        echo json_encode($user->data);
    }
}