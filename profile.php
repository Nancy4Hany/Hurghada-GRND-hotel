<?php
session_start();
require 'controllers/ProfileController.php';

$controller = new ProfileController();
$user = $controller->showData();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "QC.html";

    ?>

</head>
<body>
    <div class = "container">
    <div class = "col-md-3 col-sm-6 my-3 my-md-20">

    <div class = "card shadow">

        <div class="relative flex items-center justify-center w-32 h-32 select-none">
        <img class="object-cover object-center w-full h-full rounded-full" src = "blank-profile-picture.png" alt="assda">
        </div>
        <div class = "text-xl leading-normal indent-5">
            <h5>Name: <?= $user->data["name"]?></h5>
            <h5>Email: <?= $user->data["email"]?></h5>
            <h5>Birth Date: <?= $user->data["birth_date"]?></h5>
            <h5>National ID: <?= $user->data["national_id"]?></h5>
            <!-- <h5>ID:<?= $_SESSION['id']?></h5> -->

        </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>