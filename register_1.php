<?php
// step1 
require_once "controllers/UserController.php";
require_once "controllers/ReservationsController.php";
$controller = new UserController();
$result = $controller->register();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisration Form</title>
    <link rel="icon" href="images/logo.png">
</head>

<body>
    <section class="h-100 h-custom" style="background-color:aliceblue;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-6 col-xl-6">
                    
                    <div class="card rounded-3 shadow" style="width:40em; height:60em">
                        <img src="images/hotelreg.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt=" ">
                        <div class="card-body p-4 p-md-4">
                            <h3 class="text-center shadow p-3 mb-3 rounded" style="font-size:35px; color:#725A7A; font-family:Playfair Display;"><b><i>Sign-in</i></b></h3>
                            <form class="form-outline px-md-2">
                                <div>
                                    <div class="mb-1">
                                        <label class="form-label" style="font-family: Open Sans; font-size:20px; color:#725A7A" for="name">Name</label>
                                        <input type="text" id="name" class="form-control" placeholder="Enter Your Name" />
                                    </div>

                                    <div class="form-outnline mb-1">
                                        <label for="email" style="font-family: Open Sans; font-size:20px; color:#725A7A" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Enter your email" />

                                    </div>

                                    <div class="form-outnline mb-1">
                                        <label for="password" style="font-family: Open Sans; font-size:20px; color:#725A7A" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password1" placeholder="Enter Your Password" />

                                    </div>

                                    <div class="form-outnline mb-1">
                                        <label for="password" style="font-family: Open Sans; font-size:20px; color:#725A7A" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password2" placeholder="Re-enter Password" />
                                    </div>

                                    <div class="form-outnline mt-3">
                                        <label for="password" style="font-family: Open Sans; font-size:20px; color:#725A7A" class="form-label">Gender</label>
                                        <select class="select">
                                            <option value="1" disabled>Gender</option>
                                            <option value="2">Female</option>
                                            <option value="3">Male</option>
                                            <option value="4">Other</option>
                                        </select>
                                    </div>

                                    <label class="block text-sm mb-3">
                                        <div class="personal image">
                                            <span class="text-gray-700 dark:text-gray-400" style="font-family: Open Sans; font-size:20px; color:#725A7A">National ID</span>
                                            <input accept=".jpg,.png,.jpeg" name="national_id" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                        </div>
                                    </label>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-lg mb-1 " style="background-color:cadetblue; ">Submit</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
</body>

</html>


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


                    <div class="gender ">
                        <label>Gender</label>
                        <select required name="gender">

                            <option disabled selected>Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Others</option>
                        </select>
                    </div>


                </div>
            </div>

            <div class="font-weight-bold">ID details </div>

            <div class="fields">


                <div class="id num ">
                    <label>ID Number</label>
                    <input type="number" placeholder="Enter ID number" name="national_id" required>
                </div>

            </div>


            <label class="block text-sm mt-4">
                <div class="personal image">
                    <span class="text-gray-700 dark:text-gray-400">National ID</span>
                    <input accept=".jpg,.png,.jpeg" name="national_id" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />


                </div>
            </label>

            <button type="submit" name="submit" class="btn btn-success">Save and Next </button>



    </div>
    </form>
    </div>

</body>

</html> -->