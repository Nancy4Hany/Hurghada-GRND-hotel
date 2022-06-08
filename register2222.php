<?php
require_once "controllers/UserController.php";
$controller = new ReservationsController();
$result = $controller->register();
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .bg {
        background-color: chocolate;

    }

    .font {
        font-weight: 200;
    }
</style>

<head>
    <title>Regisration Form </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg ">
    <header>
        <a href="">
            <h1 class="text-center">Hurghada-grand-hotel</h1>
        </a>
    </header>
    <div class="container">
        <h2 class="font-weight-bolder">Regisration Form </h2>
        <?php // display message when registration is success
        if ($result) {
        ?>
            <p></p>registration added successfully</p>
        <?php
        }
        ?>

        <form action="#" method="POST">
            <div class="first form">
                <div class="font-weight-bold">Personal details</div>

                <div class="fields">
                    <div class=" First name">
                        <label> Name</label>
                        <input type="text" name="name" placeholder="Enter your first name" required>
                    </div>


                    <div class="birth date">
                        <label>Date of Birth</label>
                        <input type="date" name="birth_date" placeholder="Enter birth date" required>
                    </div>

                    <div class="e-mail">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>


                            <option disabled selected>Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Others</option>
                        </select>
                    </div>

                 

            <div class="font-weight-bold">ID details </div>

            <div class="fields">
                <div class="id">
                    <label>ID Type</label>
                    <input type="text" placeholder="Enter ID type" name="ID_type" required>
                </div>

                <div class="id num ">
                    <label>ID Number</label>
                    <input type="number" placeholder="Enter ID number" name="national_id" required>
                </div>

            </div>
            <div class="personal image">
                <label>personal image </label>
                <input type="image" placeholder="upload your photo " name="personal_image" required>

           

               

                    <div class="nationality">
                        <label>Nationality</label>
                        <input type="text" placeholder="Enter nationality" name="nationality" required>
                    </div>


                    <div>
                        <button type="submit" name="submit" class="btn btn-success">Save and Next </button>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>

</body>

</html>