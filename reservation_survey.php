<?php
include './controllers/FeedbackController.php';
$controller = new FeedbackController();
$questions = $controller->show_survey();
$submit = $controller->submit_survey();

?>




<form method="POST">
<?php
foreach($questions as $question){
    ?>
    
    <label >
        <p><?=$question["question"];?></p>
        <input type="hidden" value="<?= $question["id"]; ?>" name="question_id[]">
        <input type="text" name="answer[]">
    </label>
    <?php
}

?>
<input type="submit" name="submit">
</form>