<!DOCTYPE html > 
<?php
include "../models/User.php";
include "../controllers/UserController.php";
$controller = new UserController();
$registered = $controller->register();


?>
<html lang = "en" >
       <?php
    if ($registered === true) {
    ?>
      <div class="py-2 px-4 bg-green-200 text-green-600">User has been added!</div>
    <?php
    } else if ($registered === false) {
    } else {

    ?>
      <div class="py-2 px-4 bg-red-200 text-red-600">
        <?php
        echo nl2br($registered);
        ?>
      </div>
    <?php
    }
    ?>
    <style>
        .bg{
 background-color: chocolate;
background-image: linear-gradient(315deg, chocolate 100%);
  }
  </style>
    <head>
        <meta charset="utf-11">
        <title> Regisration Form </title>
     
    </head>
</head>
<body
    class = "min-h-screen pt-12 md:pt-20" style="font-family:'lato' ,"sans-serif;" >
    <header class = " bg-white  max-w-lg mx-auto p-8 md:pt-12 my-10 rounded-lg shadow-2xl" >
        <a href ="" >
            <h1 class="text-4xl font-bold  text-white text-center no-underline">Hurghada-grand-hotel</h1>
        </a>
         </header>
    <div class="container">
        <h1 class = "font-bold text-2xl" > Regisration  </h1>

        <form action="#">
            <div class="first form ">
                <div class="details personal">
                    <span class="text-2xl font-bold ">Personal Details</span>

                    <div class="fields">
                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Full Name</label>
                            <input type="text"  name ="name" placeholder="Enter your name" required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Date of Birth</label>
                            <input type="date" placeholder="Enter birth date" required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Mobile Number</label>
                            <input type="number" placeholder="Enter mobile number" required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Gender</label>
                            <select required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Occupation</label>
                            <input type="text" placeholder="Enter your ccupation" required>
                        </div>
                    </div>
                </div>

                <div class="details ID">
                    <span class="text-2xl font-bold ">Identity Details</span>

                    <div class="fields">
                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>ID Type</label>
                            <input type="text" placeholder="Enter ID type" required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>ID Number</label>
                            <input type="number" placeholder="Enter ID number" required>
                        </div>
              
            </div>
            <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                <label>personal image </label>
                <input type="image" placeholder="Enter your photo " required>
            </div>
            <div class="form second">
                <div class="text-2xl font-bold ">
                    <span class="title">Address Details</span>

                    <div class="fields">
                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Address </label>
                            <input type="text" placeholder="Enter your address " required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Nationality</label>
                            <input type="text" placeholder="Enter nationality" required>
                        </div>

                        <div class="text-2xl font-bold ">
                    <span class="title">Family Details</span>

                    <div class="fields">
                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Father Name</label>
                            <input type="text" placeholder="Enter father name" required>
                        </div>

                        <div class="bg-grey-200 rounded w-full text-grey-700 focus:outline-none border-b-4 border-gray-300 focus: border-purple-600 transition-duration-500 px-3 pb-3"">
                            <label>Mother Name</label>
                            <input type="text" placeholder="Enter mother name" required>
                        </div>

                    </div>
 <button class="bg-purple-600 hover:bg-purple-700  text-white font-bold py-2 rounded shadow-lg hover: shadow-2xl transition-duration-200" name="submit" type = "submit" >submit </button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

</body>
</html>