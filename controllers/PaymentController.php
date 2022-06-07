<?php
require_once dirname(__FILE__) . '/../models/Payment.php';
require_once dirname(__FILE__) . '/../classes/DB.php';
class PaymentController{
    public function add_payment()
    {
        if (isset($_POST["submit"])) {
                //FOR TESTING
                $_SESSION["id"] = 1;
                
            $user_id=$_SESSION['id'];
            $card_holder = $_POST['card_holder'];
            $creditcard_number = $_POST['creditcard_number'];
            $securitycode = $_POST["securitycode"];
            $postalcode = $_POST["postalcode"];
            $exp_date = $_POST["exp_date"];
            
            $payment = new Payment();
            $payment->data["user_id"]=$user_id;
            $payment->data["card_holder"] = $card_holder;
            $payment->data["credit_card_number"] = $creditcard_number;
            $payment->data["security_code"] = $securitycode;
            $payment->data["exp_date"] = $exp_date;
            $payment->data["postal_code"] = $postalcode;

            if ($payment->save()) {
                return true;
            }
        }
        return false;
    }

}




?>


