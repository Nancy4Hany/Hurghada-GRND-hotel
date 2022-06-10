<?php
session_start();
require_once 'controllers/RoomsController.php';
require_once 'models/Room.php';

$controller = new RoomsController();
$rooms = $controller->showDetails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="roomDetailscss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-image: url('images/feedbackbegad.jpg');">
<div class = "card mt-4 shadow-lg bg-white rounded"> 
    <h1 class="text-center py-5">Room Details</h1>
    <div class="rooms">
    <div class="slider">
        <input type="radio" name="slide" id="img1" checked>
        <input type="radio" name="slide" id="img2">
        <input type="radio" name="slide" id="img3">
        <input type="radio" name="slide" id="img4">

        <div class="slides">
            <div class="overflow">
                <div class="inner">
                    <div class="slide m1">
                        <div class="content">
                        <img class ="card-img-left" src ="<?= $rooms->data["room_image"]?>" alt = "ahgsgfd" style="width: 50%;">
                        </div>
                    </div>
                    <div class="slide m2">
                        <div class="content">
                            <img src="queen.jpg" style="width: 50%;">
                        </div>
                    </div>
                    <div class="slide m3">
                        <div class="content">
                            <img src="../../resources/img/home page/bathroom.jpg">
                        </div>
                    </div>
                    <div class="slide m4">
                        <div class="content">
                            <img src="../../resources/img/home page/room.jpg">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="dots">
            <label for="img1"></label>
            <label for="img2"></label>
            <label for="img3"></label>
            <label for="img4"></label>
        </div>
    </div>
</div>
            <div class = "card-body">
            <h5 class = "mb-4">Name: <?= $rooms->data["name"]?></h5>
            <h5 class = "mb-4">Room number: <?= $rooms->data["number"]?></h5>
            <h5 class = "mb-4">Room Type:<?php 
                echo $rooms->data["room_type_name"];
            ?> </h5>
            <h5 class = "mb-4">Price: <?= $rooms->data["price"] ?> EGP</h5>
            <h5 class = "mb-4">Sea view:<?= $rooms->data["is_sea_view"]?" Yes":" No";?></h5>
        </div>
    </div>
    </div>
</body>
</html>