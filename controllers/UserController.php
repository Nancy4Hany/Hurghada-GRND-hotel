<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../classes/functions.php';
require_once dirname(__FILE__) . '/../models/User.php';
require_once dirname(__FILE__) . '/../models/UserType.php';

class UserController{
    public function date(){
    if (isset($_POST["submit"])){


    }

    }
    public function register()
    {
        if (isset($_POST["submit"])) {
            $validation_items = ["name", "email", "password", "confirm_password", "birth_date"];
            $validation_message = "";
            foreach ($validation_items as $item) {
                if (!isset($_POST[$item]) || $_POST[$item] == "") {
                    $name = Helper::snake2camel($item,true);
                    $validation_message .= "Please enter a valid $name. <br>";
                }
            }
            if ($_POST["password"] != $_POST["confirm_password"]) {
                $validation_message .= "Passwords do not match. <br>";
            }


            if (User::findbyemail($_POST['email'])) {
                $validation_message = "user already exist\n";
            }

            
            $name = $_POST['name'];
            $email = $_POST['email'];
            // $address = $_POST['address'];

            if(!isset($_FILES['national_id'])){
                $validation_message .= "Please upload a valid national id. <br>";
            }else{
                $national_id = $_FILES['national_id'];
                $target_directory = dirname(__FILE__) . '/../uploads';
                $ext = @end((explode(".", $national_id["name"])));
                $file_name = time() . ".$ext";
                $target_file = $target_directory . '/' . $file_name;
                move_uploaded_file($national_id["tmp_name"], $target_file);
                $national_id = "uploads/".$file_name;
            }
            $birth_date = date('Y-m-d', strtotime($_POST['birth_date']));
            

            if ($validation_message != "") {
                return $validation_message;
            }
           
            $user= new user();
            $user->data["user_type_id"] = 1; // user type for guests
            $user->data["name"] = $name;
            $user->data["email"] = $email;
            $user->data["national_id"] = $national_id;
            $user->data["birth_date"] = $birth_date;
            $user->data["user_type_id"] = 1;
            $user->data["password"] = password_hash($_POST["password"], PASSWORD_DEFAULT);
            // $user->data["nationality"] = $nationality;
            // $user->data["address"] = $address;
            // $user->data["phone"] = $mobile_number;
            // $user->data["nationality"] = $nationality;
            // $user->data["address"] = $address;
            // $user->data["phone"] = $mobile_number;
        
        if($user->save()){
            return true;

        }
    }
    return false;
}
    
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
            move_uploaded_file($image["tmp_name"], $target_file);
            $image = $file_name;



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
            $user->data["image"] = $image;
            
            if($user->save()){
                return true;
            }
        }
        return false;
    }
    //loji pulled

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
            $user = User::findbyemail($email);
            if($user){
                if(password_verify($password, $user->getPassword())){
                    $_SESSION['id'] = $user->data['id'];
                    $user_type = $user->getType();
                    if ($user_type == "Receptionist" || $user_type == "Quality Control") {
                        header('Location: ./dashboard');
                        exit();
                    } else {
                        header('Location: ./');
                        exit();
                    }
                }else{
                    return "Incorrect email or password";
                }
            }else{
                return "Incorrect email or password";
            }
        }
    }


//             $national_id = $_FILES['national_id'];
//             $target_directory = dirname(__FILE__).'/../uploads';
//             $ext = @end((explode(".", $national_id["name"])));
//             $file_name = time() . ".$ext";
//             $target_file = $target_directory . '/'. $file_name;
//             move_uploaded_file($national_id["tmp_name"], $target_file);

//             $national_id = $file_name;
//             $birth_date = date('Y-m-d',strtotime($_POST['birth_date']));
            
//             // $user_type_id = $_POST['user_type_id'];
//             $user_type_id = 1;
//             if(isset($_POST['id'])){
//                 $user = User::find($_POST["id"]);
//             }else{
//                 $user = new User();
//             }
//             $user->data["name"] = $name;
//             $user->data["email"] = $email;
//             $user->data["password"] = $password;
//             $user->data["national_id"] = $national_id;
//             $user->data["birth_date"] = $birth_date;
//             $user->data["user_type_id"] = 1;
//             $user->data["nationality"] = $nationality ; 
//             $user->data["address"] = $address ; 
            
            
//             if($user->save()){
//                 return true;
//             }
//         }
//         return false;
//     }
}