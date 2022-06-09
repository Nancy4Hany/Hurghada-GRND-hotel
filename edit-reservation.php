<?php


if(!isset($_GET['id'])){
    die('Please provide an id');
}

$reservation_id = $_GET['id'];
if(!is_numeric($reservation_id)){
    die('Please provide a numeric id');
}

include "create-reservation.php";