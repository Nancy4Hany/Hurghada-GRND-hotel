<?php
require_once dirname(__FILE__) . '/../models/Payment.php';
require_once dirname(__FILE__) . '/../classes/DB.php';
require_once dirname(__FILE__) . '/ActivityLogController.php';
class PaymentController
{
    public function add_payment()
    {
        $month = date("m", time()); //stores current time month
        $year = date("y", time()); // stores curren ttime year
        if (isset($_POST["submit"])) {
            $validation_message = "";
            if (is_numeric($_POST['card_holder']) || empty($_POST['card_holder'])) {
                echo   $validation_message .= "please enter name\n";
            } else if (!is_numeric($_POST['creditcard_number']) || $_POST['creditcard_number'] > 9999999999999999 || $_POST['creditcard_number'] <1 || empty($_POST['creditcard_number'])) {
                echo  $validation_message .= "please enter valid number\n";
            } else if (!is_numeric($_POST['security_code']) || $_POST['security_code'] > 9999 || $_POST['security_code'] <1 || empty($_POST['security_code'])) {
                echo $validation_message .= "please enter valid security code\n";
            } else if (!is_numeric($_POST['postal_code']) || $_POST['postal_code'] > 99999 || $_POST['postal_code'] <1 || empty($_POST['postal_code'])) {
                echo   $validation_message .= "please enter valid postal code\n";


            } else if ($_POST['exp_year'] < $year || $_POST['exp_year'] > 99 || $_POST['exp_year'] <1 || empty($_POST['exp_year'])) { //check for year if less than time
                echo $validation_message .= "please eneter valid exp year\n";
            } else if ($_POST['exp_year'] == $year && $_POST['exp_month'] < $month || $_POST['exp_month'] > 12 || $_POST['exp_month'] <1 || empty($_POST['exp_month'])) { // check if same year can't use all months  within range
                echo $validation_message .= "please eneter valid exp month1\n";
            } else if ($_POST['exp_year'] != $year && $_POST['exp_month'] > 12 || $_POST['exp_month'] <1 || empty($_POST['exp_month'])) { // checks if not same year can use all months within range
                echo $validation_message .= "please enter valid exp month2";
            } 
            
            else { //if all validations are complete proceed to database
                

                $user_id = $_SESSION['id'];
                $card_holder = $_POST['card_holder'];
                $creditcard_number = $_POST['creditcard_number'];
                $security_code = $_POST["security_code"];
                $postal_code = $_POST["postal_code"];
                $exp_month = $_POST["exp_month"];
                $exp_year = $_POST["exp_year"];

                $payment = new Payment();
                $payment->data["user_id"] = $user_id;
                $payment->data["card_holder"] = $card_holder;
                $payment->data["credit_card_number"] = $creditcard_number;
                $payment->data["security_code"] = $security_code;
                $payment->data["exp_month"] = $exp_month;
                $payment->data["postal_code"] = $postal_code;
                $payment->data["exp_year"] = $exp_year;

                if ($payment->save()) {
                    return true;
                    header("Location: homepage.php");
                }
            }
           


            //FOR TESTING

        }

        //make function types the pricce paid 

        //funciton log (action,description,id)
        ActivityLogController::makelog("payment", "", $$_SESSION['id']);

        return false;
    }
}
