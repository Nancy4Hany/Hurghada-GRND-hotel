<?php
// step1 
require_once "controllers/UserController.php";
require_once "controllers/ReservationsController.php";
$controller = new UserController();
$result = $controller->register();
// $result = $controller->add_user();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sign-in Page</title>
    <link rel="icon" href="images/logo.png">
</head>

<body>
    <section style="background-image:url('images/signinblur.jpg') ; background-size:cover ">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-6 col-xl-6">
                    <div class="card rounded shadow mb-4" style="width:35em; background-color:#F9F9F9">
                        <!-- <img src="images/signin.jpg" class="w-100 rounded" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt=" "> -->
                        <div class="card-body p-4 p-md-4">
                            <h3 class="text-center shadow p-3 mb-3 rounded" style="font-size:35px; color:#725A7A; font-family:Playfair Display;"><b><i>Sign-up</i></b></h3>
                            <?php
                            if($result === true ){
                                ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>Success!</strong> You have successfully registered.
                                </div>
                                
                                <?php
                            }else if($result !== false) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Error!</strong> <?php echo $result; ?>
                                </div>  
                                <?php
                            }
                            ?>
                            <form class="form-outline px-md-2" enctype="multipart/form-data" method="post" action="<?php htmlspecialchars("")//for added security from injections  ?>">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label" style="font-family: Open Sans; font-size:20px; color:#FFCE45" for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter Your Name" />

                                    </div>

                                    <div class="form-outnline mb-3">
                                        <label for="email" style="font-family: Open Sans; font-size:20px; color:#FFCE45" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />

                                    </div>
                                    <div class="form-outnline mb-3">
                                        <label for="email" style="font-family: Open Sans; font-size:20px; color:#FFCE45" class="form-label">Birth Date</label>
                                        <input type="date" class="form-control" id="date" name="birth_date"  />
                                    </div>
                                    <div class="form-outnline mb-3">
                                        <label for="password" style="font-family: Open Sans; font-size:20px; color:#FFCE45" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password1" placeholder="Enter Your Password" />

                                    </div>

                                    <div class="form-outnline mb-3">
                                        <label for="password" style="font-family: Open Sans; font-size:20px; color:#FFCE45" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="password2" placeholder="Re-enter Password" />
                                    </div>



                                    <label class="block text-sm mb-3">
                                        <div class="personal image">
                                            <span class="text-gold-700 dark:text-gold-400" style="font-family: Open Sans; font-size:20px; color:#FFCE45">National ID</span>
                                            <input accept=".jpg,.png,.jpeg" name="national_id" type="file" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                        </div>
                                    </label>
                                    <br></br>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-success btn-lg mb-1 " style="background-color:cadetblue;">Submit</button>

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
