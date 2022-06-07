<?php
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/../models/User.php';

class UserController{
    public function date(){
    if (isset($_POST["submit"])){



    }

    }
    public function register()
    {
        if (isset($_POST["submit"])) {
            // $validation_message = "";
            // if (!isset($_POST['name']) || empty($_POST['name'])) {
            //     $validation_message .= "Please enter a valid name\n";
            // }
<<<<<<< HEAD
        //    if (User::findbyemail($_GET['email'])) {
        //         $validation_message = "user already exist\n";
        //     }
          
        
            // if ($validation_message != "") {
            //     return $validation_message;
            // }
=======
            //    if (User::findbyemail($_GET['email'])) {
            //         $validation_message = "user already exist\n";
            //     }


            // if ($validation_message != "") {
            //     return $validation_message;
            // }
           
>>>>>>> 73d07169b9a36acb11c7c01c0e726c71c67b8040
            $name = $_POST['name'];
            $email = $_POST['email'];
            $nationality = $_POST['nationality'];
            $address = $_POST['address'];
            $national_id = $_POST['national_id'];
            $mobile_number = $_POST['mobile_number'];
            $birth_date = date('Y-m-d', strtotime($_POST['birth_date']));
            // $target_directory = dirname(__FILE__) . '/../uploads';
            // $ext = @end((explode(".", $national_id["name"])));
            // $file_name = time() . ".$ext";
            // $target_file = $target_directory . '/' . $file_name;
            // move_uploaded_file($national_id["tmp_name"], $target_file);
            // $national_id = $file_name;


            // $user_type_id = $_POST['user_type_id'];
<<<<<<< HEAD
            // $user_type_id = 1;
=======
           
>>>>>>> 73d07169b9a36acb11c7c01c0e726c71c67b8040
            // if (isset($_POST['id'])) {
            //    x` $user = User::find($_POST["id"]);
            // } else {
            //     $user = new User();
            
            $user= new user();
<<<<<<< HEAD
=======
            $user->data["user_type_id"] = 1; // user type for guests
>>>>>>> 73d07169b9a36acb11c7c01c0e726c71c67b8040
            $user->data["name"] = $name;
            $user->data["email"] = $email;
            $user->data["national_id"] = $national_id;
            $user->data["birth_date"] = $birth_date;
<<<<<<< HEAD
            $user->data["user_type_id"] = 1;
            $user->data["nationality"] = $nationality;
            $user->data["address"] = $address;
            $user->data["phone"] = $mobile_number;
=======
            // $user->data["nationality"] = $nationality;
            // $user->data["address"] = $address;
            // $user->data["phone"] = $mobile_number;
>>>>>>> 73d07169b9a36acb11c7c01c0e726c71c67b8040
        
        if($user->save()){
            return true;

        }
        return false;
    }
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
//    public function register()
//     {
//         if (isset($_POST["submit"])) {
//             $validation_message = "";
//             if(!isset($_POST['name']) || empty($_POST['name'])){
//                 $validation_message .= "Please enter a valid name\n";
//             }
//               if (User::findbyemail($_GET['email']))
//             {
//                $validation_message = "user already exist\n" ; 
//             }
//             if($validation_message != ""){
//                 return $validation_message;
//             }
//             $name = $_POST['name'];
//             $email = $_POST['email'];
//             $password = "123456";
//             $nationality = $_POST['nationality']; 
//               $address = $_POST['address']; 
//             // $password = $_POST['password'];

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