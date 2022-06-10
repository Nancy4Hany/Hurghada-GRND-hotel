<?php
session_start();
require_once 'controllers/ReservationsController.php';
require_once 'models/Room.php';

$controller = new ReservationsController();
$reservation = $controller->showDetails();
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
            <?php
            $guests = 0;
            $price = 0;
            foreach($reservation->data["rooms"] as $room){
                $guests += $room["quantity_of_guests"];
                $_room = Room::find($room["id"]);
                $price += $_room->data["price"];
            }
           
            ?>
            <h5>Name: <?= $reservation->data["user_name"]?></h5>
            <h5>Rooms: <?= count($reservation->data["rooms"]) ?></h5>
            <h5>Nights: </h5>
            <h5>Guests: <?= $guests ?></h5>
            <h5>Facilities: WIFI,SPA, pool</h5>
            <h5>Date: <?= $reservation->data["start_date"]?> - <?= $reservation->data["end_date"]?></h5>
            <h5>Price: EGP <?= $price?></h5>
            <h5>Status: <?= $reservation->data["status"]?"Accepted":"Rejected";?></h5>

        </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>