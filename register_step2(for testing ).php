<?php
// step1 
require_once "controllers/ReservationsController.php";
require_once "controllers/RoomsController.php";

$controller = new RoomsController();
$rooms = $controller->find_available(); // to find available rooms
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <a href="">
            <h1 class="text-center">Hurghada-grand-hotel</h1>
        </a>
    </header>
    <div class="container">
        <h2 class="font-weight-bolder">Find Rooms</h2>
        <form method="POST">

            <div class="first form">
                <div class="font-weight-bold">Personal details</div>

                <div class="fields">

                    <div class="start_date">
                        <label>starting date</label>
                        <input type="date" name="start_date" placeholder="Enter starting date" required>
                    </div>
                    <div class="end_date">
                        <label>ending date</label>
                        <input type="date" name="end_date" placeholder="Enter ending date" required>
                    </div>


                </div>
            </div>

            

            <button type="submit" name="submit" class="btn btn-success">Save and Next </button>



    </div>
    </form>
    </div>
   <!-- here to display available rooms  -->
    <?php
        if($rooms)
        foreach($rooms as $room){

            ?>
            <div>
                <!-- returns the name of the available room column according to the function -->
                     <?= $room["name"];?> 
            </div>

            <?php
        }
    ?>
</body>

</html>