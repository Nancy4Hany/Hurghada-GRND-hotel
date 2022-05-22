<?php
require_once "API.php";
class FeedbackAPI extends API
{
    public static function create()
    {
        if ($_SERVER['REQUEST_METHOD'] != "POST") {
            http_response_code(404);
            echo json_encode(["error" => $_SERVER['REQUEST_METHOD'] . " method not allowed!"]);
            exit();
        }
        $validation = ['reservation_id', 'user_id', 'question_id', 'comment'];
        foreach ($validation as $v) {
            if (!isset($_POST[$v])) {
                echo json_encode(["error" => $v . " is required"]);
                exit();
            }
        }
        $reservation_id = $_POST['reservation_id'];
        $user_id = $_POST['user_id'];
        $question_id = $_POST["question_id"];
        $comment = $_POST["comment"];

        $status = 0;
        if (isset($_POST['id'])) {
            $feedback = Feedback::find($_POST["id"]);
        } else {
            $feedback = new Feedback();
        }

        $feedback->data["reservation_id"] = $reservation_id;
        $feedback->data["user_id"] = $user_id;
        $feedback->data["question_id"] = $question_id;
        $feedback->data["comment"] = $comment;

        $feedback->save();
        echo json_encode($feedback->data);
    }

}
