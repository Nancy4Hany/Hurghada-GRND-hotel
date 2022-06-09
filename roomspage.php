<?php
    require_once "controllers/RoomsController.php";
    include "../includes/dashboard/header.php";
    require_once dirname(__FILE__).'/models/Room.php';
    
$rooms = Room::all();
$modeler = new Room;
    
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
    
</body>
</html>