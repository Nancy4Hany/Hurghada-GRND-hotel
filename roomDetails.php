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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        h5{
            text-align: justify;
            padding-right: 5%;
            position: right;
        
        }
        
    </style>
</head>
<body style="background-image: url('images/feedbackbegad.jpg');">
<div class = "card mt-4 shadow-lg bg-white rounded"> 
    <h1 class="text-center py-5">Room Details</h1>
        <div class="mt-4 px-4" style="position: top-left;">
            <img class ="card-img-left" src ="<?= $rooms->data["room_image"]?>" alt = "ahgsgfd" style="width: 40%;">
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