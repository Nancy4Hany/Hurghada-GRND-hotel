<?php

require "models/QCQuestion.php";
require "models/QCQuestionOption.php";
require "models/QCQuestionType.php";

//$questions = QCQuestion::all();

//$questions = array_map(function($name){
//   return array($name, QCQuestionType::find())},$questions);
// <<<<<<< HEAD
// <<<<<<< HEAD
// //
// ?>
// =======
// //?>
// >>>>>>> 608b834db4d0d44ab558f0b0f0ff82e7e9bb7ee6
// =======
// //
// ?>
// >>>>>>> 0f1f508138ac55aad6b3ff89c1864367c7d0f2fd


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="icon" href="imagees/logo.png" type="image/png">
    <title>Feedback</title>
</head>

<body style="background-image: url('images/feedbackbegad.jpg');">
    <div class="container mt-4 shadow-lg bg-white">
        <div class="row ">
            <div class="col-md-3" >
            </div>
            <div class="col-md-6">
                <h2 class="text-center shadow p-3 mb-3 rounded" style="font-family: Bembo; font-size: 60px;color: #66545E; background-color:#F6E0B5">Feedback Form</h2>
                <p class="px-4 py-4" style="color: #AA6F73 ;font-size: 18px;">We would love to hear your thoughts, concerns, problems, so we can improve and make your next stay as best as we can.</p>
                <hr class="w-100">
                <form action="">
                    <h4 style="color: #AA6F73"><i> How did you hear about our hotel?</i></h4>
                    <div class="row">
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q" id="option1" class="form-check-input">
                            <label class="form-check-label" for="option1">Friends and Family</label>
                        </div>
                        <div class="form-check"  style="color: #AA6F73">
                            <input type="radio" name="q" id="option2" class="form-check-input">
                            <label class="form-check-label" for="option2">Social Media</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q" id="option3" class="form-check-input">
                            <label class="form-check-label" for="option2">Ads</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q" id="option4" class="form-check-input">
                            <label class="form-check-label" for="option4">Others</label>
                        </div>
                        <div class="form-control mt-3 mb-3" style="color: #AA6F73">
                            <label class=" form-label">If others please tell us: </label>
                            <input type="text" class="form-control" required="">
                        </div>
                    </div>
                    <br>
                    <h4 style="color: #AA6F73"> <i>How did you make your reservation?</i></h4>
                    <div class="row">
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q2" id="option1" class="form-check-input">
                            <label class="form-check-label" for="option1">Travel Agency</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q2" id="option2" class="form-check-input">
                            <label class="form-check-label" for="option2">Online</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q2" id="option3" class="form-check-input">
                            <label class="form-check-label" for="option3">Others</label>
                        </div>
                        <div class="form-control mt-3 mb-3" style="color: #AA6F73">
                            <label class=" form-label">If others please tell us: </label>
                            <input type="text" class="form-control" required="">
                        </div>
                    </div>
                    <br>
                    <h4 style="color: #AA6F73"> <i>What was the purpose of your visit?</i></h4>
                    <div class="row">
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q3" id="option11" class="form-check-input">
                            <label class="form-check-label" for="option11">Vacation</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q3" id="option22" class="form-check-input">
                            <label class="form-check-label" for="option22">Business</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q3" id="option33" class="form-check-input">
                            <label class="form-check-label" for="option33">Others</label>
                        </div>
                        <div class="form-check" style="color: #AA6F73">
                            <input type="radio" name="q3" id="option44" class="form-check-input">
                            <label class="form-check-label" for="option44">Wedding</label>
                        </div>
                        <br>
                    </div>
                    <div>
                        <br>
                        <h4 style="background-color:#33475b;"> <i>How would you rate us?</i></h4>
                        <br>
                        <table summary="" aria-labelledby="label_11" cellPadding="4" cellSpacing="0" class="form-matrix-table table table-bordered rounded-lg" data-component="matrix">
                            <tr class="form-matrix-tr form-matrix-header-tr">
                                <th class="form-matrix-th" style="border:none">

                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_0" style="color: #AA6F73">
                                    <label id="label_11_col_0"> Poor </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_1" style="color: #AA6F73">
                                    <label id="label_11_col_1"> Satisfactory </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_2" style="color: #AA6F73">
                                    <label id="label_11_col_2"> Good </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_3" style="color: #AA6F73">
                                    <label id="label_11_col_3"> Very Good </label>
                                </th>
                                <th scope="col" class="form-matrix-headers form-matrix-column-headers form-matrix-column_4" style="color: #AA6F73">
                                    <label id="label_11_col_4"> Excellent </label>
                                </th>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" aria-labelledby="label_11 label_11_row_0">
                                <th scope="row" class="form-matrix-headers form-matrix-row-headers" style="color: #AA6F73">
                                    <label id="label_11_row_0"> Service Quality </label>
                                </th>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_0_0" class="form-radio" name="q11_howWould[0]" value="Poor" aria-labelledby="label_11_col_0 label_11_row_0" />
                                    <label for="input_11_0_0" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_0_1" class="form-radio" name="q11_howWould[0]" value="Satisfactory " aria-labelledby="label_11_col_1 label_11_row_0" />
                                    <label for="input_11_0_1" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_0_2" class="form-radio" name="q11_howWould[0]" value="Good" aria-labelledby="label_11_col_2 label_11_row_0" />
                                    <label for="input_11_0_2" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_0_3" class="form-radio" name="q11_howWould[0]" value="Very Good" aria-labelledby="label_11_col_3 label_11_row_0" />
                                    <label for="input_11_0_3" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_0_4" class="form-radio" name="q11_howWould[0]" value="Excellent " aria-labelledby="label_11_col_4 label_11_row_0" />
                                    <label for="input_11_0_4" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" aria-labelledby="label_11 label_11_row_1">
                                <th scope="row" class="form-matrix-headers form-matrix-row-headers" style="color: #AA6F73">
                                    <label id="label_11_row_1"> Cleanliness </label>
                                </th>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_1_0" class="form-radio" name="q11_howWould[1]" value="Poor" aria-labelledby="label_11_col_0 label_11_row_1" />
                                    <label for="input_11_1_0" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_1_1" class="form-radio" name="q11_howWould[1]" value="Satisfactory " aria-labelledby="label_11_col_1 label_11_row_1" />
                                    <label for="input_11_1_1" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_1_2" class="form-radio" name="q11_howWould[1]" value="Good" aria-labelledby="label_11_col_2 label_11_row_1" />
                                    <label for="input_11_1_2" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_1_3" class="form-radio" name="q11_howWould[1]" value="Very Good" aria-labelledby="label_11_col_3 label_11_row_1" />
                                    <label for="input_11_1_3" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_1_4" class="form-radio" name="q11_howWould[1]" value="Excellent " aria-labelledby="label_11_col_4 label_11_row_1" />
                                    <label for="input_11_1_4" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" aria-labelledby="label_11 label_11_row_2">
                                <th scope="row" class="form-matrix-headers form-matrix-row-headers" style="color: #AA6F73">
                                    <label id="label_11_row_2"> Food </label>
                                </th>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_2_0" class="form-radio" name="q11_howWould[2]" value="Poor" aria-labelledby="label_11_col_0 label_11_row_2" />
                                    <label for="input_11_2_0" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_2_1" class="form-radio" name="q11_howWould[2]" value="Satisfactory " aria-labelledby="label_11_col_1 label_11_row_2" />
                                    <label for="input_11_2_1" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_2_2" class="form-radio" name="q11_howWould[2]" value="Good" aria-labelledby="label_11_col_2 label_11_row_2" />
                                    <label for="input_11_2_2" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_2_3" class="form-radio" name="q11_howWould[2]" value="Very Good" aria-labelledby="label_11_col_3 label_11_row_2" />
                                    <label for="input_11_2_3" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_2_4" class="form-radio" name="q11_howWould[2]" value="Excellent " aria-labelledby="label_11_col_4 label_11_row_2" />
                                    <label for="input_11_2_4" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                            </tr>
                            <tr class="form-matrix-tr form-matrix-value-tr" aria-labelledby="label_11 label_11_row_3">
                                <th scope="row" class="form-matrix-headers form-matrix-row-headers" style="color: #AA6F73">
                                    <label id="label_11_row_3"> Staff </label>
                                </th>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_3_0" class="form-radio" name="q11_howWould[3]" value="Poor" aria-labelledby="label_11_col_0 label_11_row_3" />
                                    <label for="input_11_3_0" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_3_1" class="form-radio" name="q11_howWould[3]" value="Satisfactory " aria-labelledby="label_11_col_1 label_11_row_3" />
                                    <label for="input_11_3_1" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_3_2" class="form-radio" name="q11_howWould[3]" value="Good" aria-labelledby="label_11_col_2 label_11_row_3" />
                                    <label for="input_11_3_2" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_3_3" class="form-radio" name="q11_howWould[3]" value="Very Good" aria-labelledby="label_11_col_3 label_11_row_3" />
                                    <label for="input_11_3_3" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                                <td class="form-matrix-values">
                                    <input type="radio" id="input_11_3_4" class="form-radio" name="q11_howWould[3]" value="Excellent " aria-labelledby="label_11_col_4 label_11_row_3" />
                                    <label for="input_11_3_4" class="matrix-choice-label matrix-radio-label"> </label>
                                </td>
                            </tr>
                        </table>
                        <br>

                        <div class="form-control mt-3 mb-3" style="color: #AA6F73">
                            <label class=" form-label"><i><b>Full Name: </b></i></label>
                            <input type="text" class="form-control" required="">
                        </div>
                        <div class="form-control mb-2" style="color: #AA6F73">
                            <label class=" form-cotrol"><i><b>Email: </b></i></label>
                            <input type="email" class="form-control" required="">
                        </div>
                        <div class="form-control mb-2" style="color: #AA6F73">
                            <label class=" form-cotrol"><i> <b>Describe Feedback: </b></i></label>
                            <textarea rows="4" class="form-control" required=""></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary bg-dark" type="submit">
                            Submit Feedback
                        </button>
                    </div>
            </div>
            </form>

        </div>

    </div>
    </div>

    <?php
    include './controllers/FeedbackController.php';
    $controller = new FeedbackController();
    $questions = $controller->show_survey();
    $submit = $controller->submit_survey();
    ?>

    <form method="POST">
        <?php
        
        foreach ($questions as $question) {
        ?>

            <label>
                <p><?= $question["question"]; ?></p>
                <input type="hidden" value="<?= $question["id"]; ?>" name="question_id[]">
                <input type="text" name="answer[]">
            </label>
        <?php
        }

        ?>
        <input type="submit" name="submit">
    </form>
</body>

</html>