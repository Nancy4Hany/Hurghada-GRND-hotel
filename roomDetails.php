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
<?php
    include "QC.html";
?>
</head>
<body>
<div class = "container">
    <div class = "col-md-3 col-sm-6 my-3 my-md-20">

    <div class = "card shadow">

        <div class = "text-xl leading-loose indent-5">

            <img src ="<?= $rooms->data["image"]?>" alt = "ahgsgfd">

            <h5>Name: <?= $rooms->data["name"]?></h5>
            <h5>Room number: <?= $rooms->data["number"]?></h5>
            <h5>Room Type:<?php 
                echo $rooms->data["room_type_name"];
            ?> </h5>
            <h5>Price: <?= $rooms->data["price"] ?> EGP</h5>
            <h5>Sea view:<?= $rooms->data["is_sea_view"]?" Yes":" No";?></h5>

        </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>