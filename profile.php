<!DOCTYPE html>
<html lang="en">
<head>
    <?php
     session_start();
    include "QC.html";
    include "connect.php";

    ?>

</head>
<body>
    <div class = "container">
    <div class = "col-md-3 col-sm-6 my-3 my-md-20">

        
    <div class = "card shadow">

        <div class="relative flex items-center justify-center w-32 h-32 select-none">
        <img class="object-cover object-center w-full h-full rounded-full" src = "blank-profile-picture.png" alt="assda">
        </div>
        <div class = "text-xl leading-normal indent-5">
            <?php
                $sql = "select * from users where id = '1'";//id lazem yet8ayar
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_assoc($result);

                if($result)
                {
                    $name = $row['name'];
                    $email = $row['email'];
                    $birth = $row['birth_date'];
                    $nationalid = $row['national_id'];
                    $id = $row['id'];
                    echo "<h5>Name: $name</h5>
                    <h5>Email: $email</h5>
                    <h5>Birth Date: $birth</h5>
                    <h5>National ID: $nationalid</h5>
                    <h5>ID:$id</h5>";

                }
                
            ?>
            

        </div>
    </div>
    </div>
    </div>
    </div>
</body>
</html>