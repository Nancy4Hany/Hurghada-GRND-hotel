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

            $national_id = $_FILES['national_id'];
            $target_directory = dirname(__FILE__).'/../uploads';
            $ext = @end((explode(".", $national_id["name"])));
            $file_name = time() . ".$ext";
            $target_file = $target_directory . '/'. $file_name;
            move_uploaded_file($national_id["tmp_name"], $target_file);

            $national_id = $file_name;
            $birth_date = date('Y-m-d',strtotime($_POST['birth_date']));
            $user_type_id = $_POST['user_type_id'];
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
    public function login(){
        if(isset($_SESSION['id'])){
            $user = User::find($_SESSION['id']);
            $user_type = $user->getType();
            if ($user_type == "Receptionist" || $user_type == "Quality Control") {
                header('Location: ./dashboard');
                exit();
            } else {
                header('Location: ./');
                exit();
            }
        }

        if(isset($_POST['login'])){
            if(!isset($_POST['email']) && !isset($_POST['password'])){
                return "Incorrect email or password";
            }
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user_id = User::login($email,$password);
            if($user_id){
                $user = User::find($user_id);
                $user_type = $user->getType();
                $_SESSION["id"] = $user_id;
                if($user_type == "Receptionist" || $user_type == "Quality Control"){
                    header('Location: ./dashboard');
                    exit();
                }else{
                    header('Location: ./');
                    exit();
                }
            }else{
                return "Incorrect email or password";
            }
        }
        return false;
    }

}