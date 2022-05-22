<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    //include "QC.html";
    include "connect.php";
    ?>
    <link rel="stylesheet" href="./layout/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card{
            background-color: gold;
            
        }
        a{
            text-decoration: none;
        }
        a:hover{
            background-color:darkorange;
        }
        .hidden{
            visibility: hidden;
            display:none;
        }
    </style>
        
  
</head>
<body>
    <?php
    function reserveCard(){
        //lazem form....
    }
    $id = $_SESSION['id'];
        $sql = "select * from reservations where user_id = '$id'";//id lazem yet8ayar
        $result = mysqli_query($con,$sql);

        if($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
            $id = $row['id'];
            $start = $row['start_date'];
            $end = $row['end_date'];
            //$_SESSION['temp_id'] = $row['id'];
            echo "
            
            <a href = 'details.php?id=".$id."' class='card' id = 'card'>
            <div class='card-body'>
            <h5>3 Rooms, 4 Guests</h5>
            <h5>$start - $end</h5>
            </div>
            </a>
            ";
            }
        }

    ?>
</body>
</html>