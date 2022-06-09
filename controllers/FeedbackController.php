<?php
require_once dirname(__FILE__) . '/../models/Feedback.php';
require_once dirname(__FILE__) . '/../models/QCQuestion.php';
require_once dirname(__FILE__) . '/../models/Reservation.php';

class FeedbackController{
    public function show_survey(){
        if(!isset($_GET['id'])){
            die("Select resevation to review");
        }
        $id = $_GET['id'];
        $reservation = Reservation::find($id);
        if($reservation == false){
            die("Reservation not found");
        }
        $questions = QCQuestion::all();
        return $questions;
    }

    public function submit_survey(){
        if(isset($_POST['submit'])){
            $ids = $_POST['question_id'];
            $answers = $_POST['answer'];
            $option = $_POST['option'];
            $i=0;
            foreach($ids as $id){
                $answer = $answers[$i];
                $feedback = new Feedback();
                $feedback->data["reservation_id"] = 1;
                $feedback->data["user_id"] = 1;
                $feedback->data["question_id"] = $id;
                $feedback->data["comment"] = $answer;
                $feedback->data["question_option_id"] = $option;
                $feedback->data["timecolumn"]=time();
                $feedback->save();
                $i++;
            }
        }
    }
}