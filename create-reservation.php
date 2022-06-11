<?php
require_once "models/Reservation.php";
require_once "models/RoomType.php";
require_once "controllers/ReservationsController.php";

if (isset($reservation_id)) {
    $reservation = Reservation::find($reservation_id);
    if ($reservation == false) {
        die("Reservation not found");
    }
    if ($reservation->data["user_id"] != $_SESSION["id"]) {
        die("You are not allowed to edit this reservation");
    }
    if ($reservation->data["status"] != 0) {
        die("You can't edit a reservation that has already been confirmed");
    }
    if ($reservation->data["start_date"] < date("Y-m-d")) {
        die("You can't edit a reservation that has already started");
    }
    if ($reservation->data["end_date"] < date("Y-m-d")) {
        die("You can't edit a reservation that has already ended");
    }
    //check if the reservation created_at is less than 5 minutes ago
    $created_at = strtotime($reservation->data["created_at"]);
    $now = time();
    $diff = $now - $created_at;
    if ($diff > 300) {
        die("You can't edit a reservation that was created more than 5 minutes ago");
    }


}

$room_types = RoomType::all();
$controller = new ReservationsController();
$result = $controller->create();

if(isset($reservation_id)){
    $reservation_rooms = ReservationRoom::find_by_reservation_id($reservation_id);
    $room_types = RoomType::all();
    $rooms = Room::all();
    $selected_rooms = array();
    foreach ($reservation_rooms as $reservation_room) {
        $selected_rooms[] = $reservation_room["room_id"];
    }
    $selected_rooms = implode(" ", $selected_rooms);
    $daterange = $reservation->data["start_date"] . " - " . $reservation->data["end_date"];
}
?>
<!DOCTYPE html>
<html lang="en" class="w-full h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title> <?= (isset($reservation_id)) ? "Edit reservation" : "Create reservation"; ?> </title>
</head>

<body class="w-full h-full" style="background-image: url('images/feedbackbegad.jpg');">

    <div id="pop_up" class="fixed -bottom-8 opacity-0 right-4 py-2 px-8 duration-700 transition-all bg-green-400 text-white">
        Data Saved Successfully
    </div>
    <div class="w-full h-full flex justify-center items-center bg-slate-100">
        <div class="w-2/3 pb-16 bg-white shadow-lg">

            <div class="mx-auto mb-16 py-4 rounded-b-xl px-16 text-5xl bg-orange-100 text-gray-700 shadow-lg table ">
                <?= (isset($reservation_id)) ? "Edit reservation" : "Reserve Room"; ?>
            </div>
            <?php
            if ($result) {
            ?>
                <p class="text-green-500 text-2xl font-bold text-center mb-16">
                    Reservation Created Successfully <br>
                    You can still edit the reservation for 5 minutes before it is confirmed. <br>
                    Once the reservation is confirmed, we will send you an email with the reservation details. <br>
                    <a href="edit-reservation.php?id=<?= $result; ?>"  class="text-green-500 underline ">Click here to edit your reservations</a>
                </p>

            <?php
            }
            ?>
            <div class="flex justify-between px-16">
                <div class="step-circle relative w-24 h-24 rounded-full bg-orange-400 ring-4 ring-orange-300 flex justify-center items-center text-4xl text-white">
                    1
                </div>
                <div class="step-circle w-24 h-24 relative rounded-full bg-orange-200 border-2 border-orange-400 flex justify-center items-center text-4xl text-white">
                    2
                </div>
                <div class="step-circle w-24 h-24 rounded-full bg-orange-200 border-2 border-orange-400 flex justify-center items-center text-4xl text-white">
                    3
                </div>

            </div>

            <form method="POST">
                <?php
                if (isset($reservation_id)) {
                ?>
                    <input type="hidden" name="reservation_id" value="<?= $reservation_id ?>">
                <?php
                }
                ?>
                <div class="step-inputs mt-8 text-center hidden">
                    <label>
                        <?php
                        $options = ["1" => "Dayuse", "2" => "Short Stay (1-7 Days)", "3" => "Long Stay (7-30 Days)", "4" => "Vacation (30+ Days)"];
                        ?>
                        <p>Select Option</p>
                        <select name="option" class="py-2 px-4 border-2 rounded-md border-gray-500" id="">
                            <option value="" disabled selected>Select an option</option>
                            <?php

                            foreach ($options as $key => $value) {
                                echo "<option value='$key' " . ((isset($_SESSION["reservation_tmp"]) && $_SESSION["reservation_tmp"]["option"] == $key) ? "selected" : "") . ">$value</option>";
                            }
                            ?>

                        </select>
                    </label>
                    <label>
                        <p>Number of guests</p>
                        <input type="number" value="<?=
                                                    ((isset($_SESSION["reservation_tmp"]) && isset($_SESSION["reservation_tmp"]["number_of_guests"])) ? $_SESSION["reservation_tmp"]["number_of_guests"] : "1")
                                                    ?>" min="1" class="py-2 px-4 border-2 rounded-md border-gray-500" name="number_of_guests">
                    </label>
                    <br>
                </div>
                <div class="step-inputs text-center hidden">
                    <div class="mt-8"></div>
                    Choose dates of your stay
                    <br>
                    <input type="text" name="daterange" class="py-2 px-4 border-2 rounded-md border-gray-500" value="<?= (isset($_SESSION["reservation_tmp"]) && isset($_SESSION["reservation_tmp"]["daterange"])) ? $_SESSION["reservation_tmp"]["daterange"] : date('m/d/Y') . "-" . date('m/d/Y') ?>" />

                </div>
                <div class="step-inputs text-center hidden">
                    <div class="w-full px-8 mt-8">
                        <p> Select room Type </p>
                        <select name="room_type_id" id="room_type" class="py-2 px-4 border-2 rounded-md border-gray-500" id="">
                            <option value="">All</option>
                            <?php

                            foreach ($room_types as $type) {
                                echo "<option value='{$type['id']}'>{$type['name']}</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <input type="hidden" name="selected_rooms" value="<?php
                    if (isset($reservation_id)) {
                        echo implode(" ",array_map(function($value){
                            return $value['room_id'];
                        }, $reservation_rooms));
                    } else if (isset($_SESSION["reservation_tmp"]) && isset($_SESSION["reservation_tmp"]["selected_rooms"])) {
                        echo $_SESSION["reservation_tmp"]["selected_rooms"];
                    } else {
                        echo "";
                    }
                    ?>">
                    <div class="rooms-container  max-h-80 overflow-y-auto">
                        <label class="hidden room transform relative m-4 hover:scale-110 transition-all border border-orange-300">
                            <input type="checkbox" class="peer hidden">
                            <div class="absolute top-0 left-0 bg-orange-500 hidden peer-checked:block"></div>
                            <div class="w-48 h-48">
                                <img src="uploads/1652970159.jpg" class="w-full h-full object-cover object-center" alt="">
                            </div>
                            <div class="py-2 px-2 text-center font-bold">
                                <p>Name</p>
                                <p class="text-green-500">
                                    EGP 300/night
                                </p>
                            </div>
                        </label>
                        <div class="container px-8 flex justify-center flex-wrap items-center w-full"></div>
                        <?php

                        if (isset($reservation_id)) {
                        ?>
                            <h1>Previously selected rooms</h1>
                            <div class="container px-8 flex justify-center flex-wrap items-center w-full">

                                <?php
                                foreach ($reservation_rooms as $room) {
                                    $room = Room::find($room["room_id"]);
                                    if (!$room) continue;
                                    $room_image = $room->getImages()[0]["image"];
                                    echo "<label class='room transform relative m-4 hover:scale-110 transition-all bg-orange-400  border-2 border-orange-300'>
                                <input type='checkbox' value='{$room->data["id"]}' class='peer hidden' checked>
                                <div class='absolute top-0 left-0 bg-orange-500 hidden peer-checked:block'></div>
                                <div class='w-48 h-48'>
                                    <img src='{$room_image}' class='w-full h-full object-cover object-center' alt=''>
                                </div>
                                <div class='py-2 px-2 text-center font-bold'>
                                    <p>{$room->data["name"]}</p>
                                    <p class='text-green-500'>
                                        EGP {$room->data["price"]}/night
                                    </p>
                                </div>
                            </label>";
                                }
                                ?>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button id="save_button" type="button" class="table mt-4 mx-2 bg-gray-800 text-white py-2 px-8">
                        Save
                    </button>
                    <button id="step_button" type="button" class="table mt-4 mx-2 bg-green-500 text-white py-2 px-8">
                        Next
                    </button>
                </div>
                <div class="mt-4 flex justify-center">
                    <a href="index.php" class="table mt-4 mx-2 bg-gray-800 text-white py-2 px-8">
                        Back to home
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        var current_step = 1;
        var max_step = 3;
        var step_circles = document.querySelectorAll('.step-circle');
        var step_inputs = document.querySelectorAll('.step-inputs');
        var step_button = document.querySelector('#step_button');
        step_inputs[0].classList.remove('hidden');

        function step(i) {
            if (i + 1 == max_step) {
                setTimeout(function() {
                    get_rooms();
                    step_button.innerText = "Submit and Finish";
                    step_button.type = "submit";
                    step_button.name = "submit";
                }, 100);
            } else {
                step_button.innerText = "Next";
                step_button.type = "button";
            }
            current_step = parseInt(step_circles[i].innerText);
            for (let i = 0; i < step_circles.length; i++) {
                step_circles[i].classList.remove('bg-orange-400');
                step_circles[i].classList.add('bg-orange-200');
                step_circles[i].classList.add('border-orange-400');
                step_circles[i].classList.remove('ring-orange-400');
                step_circles[i].classList.remove('ring-4');
                step_circles[i].classList.add('border-2');
            }

            for (let i = 0; i < current_step; i++) {
                step_circles[i].classList.add('bg-orange-400');
                step_circles[i].classList.remove('bg-orange-200');
                step_circles[i].classList.remove('border-orange-400');
                step_circles[i].classList.add('ring-orange-300');
                step_circles[i].classList.add('ring-4');
                step_circles[i].classList.remove('border-2');
            }


            for (let j = 0; j < step_inputs.length; j++) {
                step_inputs[j].classList.add('hidden');
            }
            step_inputs[i].classList.remove('hidden');
            step_inputs[i].classList.add('visible');
        }
        for (let i = 0; i < step_circles.length; i++) {
            step_circles[i].addEventListener('click', function() {
                step(i);
            });
        }
        step_button.addEventListener('click', function() {
            if (current_step < max_step) {
                current_step++;
                step(current_step - 1);

            }
        });

        function get_rooms() {
            let input = document.querySelector('input[name="selected_rooms"]');
            let form = document.querySelector('form');
            let data = new FormData(form);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'api/room/get_rooms');
            xhr.send(data);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let selected_rooms = input.value.split(' ');
                    let rooms = JSON.parse(xhr.responseText);
                    let rooms_container = document.querySelector('.rooms-container');
                    let room_copy = rooms_container.getElementsByTagName('label')[0];
                    rooms_container.querySelector('.container').innerHTML = "";
                    for (let i = 0; i < rooms.length; i++) {
                        console.log(room_copy)
                        let room_copy_clone = room_copy.cloneNode(true);
                        room_copy_clone.querySelector('input').value = rooms[i].id;
                        room_copy_clone.querySelector('input').checked = selected_rooms.includes(rooms[i].id);
                        if (room_copy_clone.querySelector('input').checked) {
                            room_copy_clone.classList.add('bg-orange-400');
                            room_copy_clone.classList.remove('bg-orange-200');
                            room_copy_clone.classList.remove('border-orange-400');
                            room_copy_clone.classList.add('ring-orange-300');
                            room_copy_clone.classList.add('ring-4');
                            room_copy_clone.classList.remove('border-2');
                        } else {
                            room_copy_clone.classList.add('bg-orange-200');
                            room_copy_clone.classList.remove('bg-orange-400');
                            room_copy_clone.classList.add('border-orange-400');
                            room_copy_clone.classList.remove('ring-orange-300');
                            room_copy_clone.classList.remove('ring-4');
                            room_copy_clone.classList.add('border-2');
                        }
                        room_copy_clone.querySelector('input').name = "room_id[]";
                        room_copy_clone.querySelector('input').checked = false;
                        room_copy_clone.querySelector('img').src = rooms[i].image.length > 1 ? rooms[i].image : "images/default.jpg";
                        room_copy_clone.querySelector('p').innerText = rooms[i].name;
                        room_copy_clone.querySelectorAll('p')[1].innerHTML = " EGP " + rooms[i].price + "/night";
                        room_copy_clone.classList.remove('hidden');
                        rooms_container.querySelector('.container').appendChild(room_copy_clone);
                    }
                    add_click_event_to_rooms();
                }
            }
        }

        document.querySelector('#room_type').addEventListener('change', function() {
            get_rooms();
        });

        function add_click_event_to_rooms() {
            let rooms = document.querySelectorAll('.rooms-container label');
            let input = document.querySelector('input[name="selected_rooms"]');
            for (let i = 0; i < rooms.length; i++) {
                rooms[i].onclick = function() {
                    input.value = input.value.replace(rooms[i].querySelector('input').value, "");
                    input.value = input.value.trim();
                    if (rooms[i].querySelector('input').checked) {
                        rooms[i].querySelector('input').checked = false;
                        rooms[i].classList.remove('bg-orange-400');
                        rooms[i].classList.add('bg-orange-200');
                        rooms[i].classList.add('border-orange-400');
                        rooms[i].classList.remove('ring-orange-400');
                        rooms[i].classList.remove('ring-4');
                        rooms[i].classList.add('border-2');
                    } else {
                        input.value += " " + rooms[i].querySelector('input').value;
                        input.value = input.value.trim();
                        rooms[i].querySelector('input').checked = true;
                        rooms[i].classList.add('bg-orange-400');
                        rooms[i].classList.remove('bg-orange-200');
                        rooms[i].classList.remove('border-orange-400');
                        rooms[i].classList.add('ring-orange-300');
                        rooms[i].classList.add('ring-4');
                        rooms[i].classList.remove('border-2');
                    }

                }
            }
        }
        document.querySelector('#save_button').addEventListener('click', function() {
            let form = document.querySelector('form');
            let data = new FormData(form);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', './api/reservation/reservation_save', true);
            xhr.send(data);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var pop_up = document.querySelector('#pop_up');
                    pop_up.classList.remove('-bottom-8');
                    pop_up.classList.add('bottom-8');
                    pop_up.classList.remove('opacity-0');
                    setTimeout(function() {
                        pop_up.classList.add('opacity-0');
                        pop_up.classList.remove('bottom-8');
                        pop_up.classList.add('-bottom-8');
                    }, 5000);
                }
            }
        });
    </script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                "maxSpan": {
                    "days": 60
                },
                "minDate": "<?= date('m/d/Y') ?>",

            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
</body>

</html>