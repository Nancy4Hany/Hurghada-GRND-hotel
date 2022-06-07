 <?php
 require_once dirname(__FILE__) . '/controllers/RoomsController.php'; 

 $controller=new RoomsController();
 $result=$controller->room_type();
 ?>
 
 <html>

<style>
    .bg {
        background-color: chocolate;

    }

    .font {
        font-weight: 200;
    }
</style>

<head>
    <title>Regisration Form 3</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg">
    <header>
        <a href="">
            <h1 class="text-center">Hurghada-grand-hotel</h1>
        </a>
    </header>
    <form action="">
            <div class=" conatainer ">
                <label for="rooms" class = " text-4xl  font-weight-bold"> reservation options </label>
                
                <select required id="rooms" name="rooms">
                    <option disabled selected>Select room type</option>
                    <option value="Single">Single </option>
                    <option value="Double">Double </option>
                    <option value="Triple"> Triple</option>
                    <option value="Twin">Twin</option>
                    <option value="Suite"> Suite</option>
                    <option value="Cabana">Cabana</option>
                    
                </select>
            </div>
            <div class="container" >
                <image src="single(1).jpg" alt="Single" width="200" height="100" ></image>
                <image src="teriple.jpg" alt="teriple" width="200" height="100"></image>
            </div>
            <div class="container">
            
                <image src="double-double-room.jpg"alt="Double" width="200" height="100" name = "Double" ></image>
            <image src="queen.jpg" alt="queen" width="200" height="100"></image>
            </div>
                    <div class="container">
              <image src="cabana.jpg" alt="cabana" width="200" height="100"></image>
                <image src="suite2.jpg" alt="suite" width="200" height="100"></image>
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-success">Save and Next </button>
            </div>
            </form>
            <?php

            ?>
            </body>
</html>