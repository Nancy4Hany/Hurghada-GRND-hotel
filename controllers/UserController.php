<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/User.php';

class UserController{
    public function add_user()
    {
        if (isset($_POST["submit"])) {
            $validation_message = "";
            if(!isset($_POST['name']) || empty($_POST['name'])){
                $validation_message .= "Please enter a valid name\n";
            }

            if($validation_message != ""){
                return $validation_message;
            }
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = "123456";
            // $password = $_POST['password'];


            $image = $_FILES['image'];
            $target_directory = dirname(__FILE__).'/../uploads';
            $ext = @end((explode(".", $image["name"])));
            $file_name = time() . ".$ext";
            $target_file = $target_directory . '/'. $file_name;
            move_uploaded_file($image["temp_name"], $target_file);
            $image = $file_name;



            $national_id = $_FILES['national_id'];
            $target_directory = dirname(__FILE__).'/../uploads';
            $ext = @end((explode(".", $national_id["name"])));
            $file_name = time() . ".$ext";
            $target_file = $target_directory . '/'. $file_name;
            move_uploaded_file($national_id["tmp_name"], $target_file);
            $national_id = $file_name;
            $birth_date = date('Y-m-d',strtotime($_POST['birth_date']));
            // $user_type_id = $_POST['user_type_id'];
            $user_type_id = 1;
            if(isset($_POST['id'])){
                $user = User::find($_POST["id"]);
            }else{
                $user = new User();
            }
            $user->data["name"] = $name;
            $user->data["email"] = $email;
            $user->data["password"] = $password;
            $user->data["national_id"] = $national_id;
            $user->data["birth_date"] = $birth_date;
            $user->data["user_type_id"] = $user_type_id;
            
            if($user->save()){
                return true;
            }
        }
        return false;
    }

}