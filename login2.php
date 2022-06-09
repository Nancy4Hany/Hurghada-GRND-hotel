<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="./layout/css/app.css">
</head>

<style>
    .row{
        padding-top: 10%;
        width: 5%;
    }
    
</style>
<body>
    <?php
    include 'connect.php';
      if(isset($_POST['submit'])) {
          $email = $_POST['email'];
          $pass = $_POST['password'];
          $sql = "select * from users where email = '$email' and password = '$pass';";
          $result = mysqli_query($con,$sql);
          $rowcount = mysqli_num_rows($result);
          if($result){
              if($rowcount > 0){

                  $row = mysqli_fetch_assoc($result);
                  $_SESSION['id'] = $row['id'];
                  $_SESSION['user_type_id'] = $row['user_type_id'];
                  $_SESSION['email'] = $row['email'];
                  $_SESSION['password'] = $row['password'];
                  $_SESSION['name'] = $row['name'];
                  $_SESSION['national_id'] = $row['national_id'];
                  $_SESSION['birth_date'] = $row['birth_date'];
                  header('location:QC.html');
                }else{
                    echo 'invalid email or password';
                }



          }else{
              echo 'database error';
          }
      } 
    ?>
    <div class="row">
<div class = 'col-md-6 shadow p-3 mb-5 bg-white rounded' >
<form action="" method = 'post'>

    <div class = "form-group">
        <label for="username">Email:</label>
        <input type="text" name = 'email' placeholder = 'Email:' id = 'Email' value = 'Email' required>
    </div>
    <div class = "form-group">
        <label for="password">Password:</label>
        <input type="password" name = 'password' placeholder = 'password' id = 'password' required>
    </div>
    <div class = "form-group">
        <input type="submit" name = 'submit' id = 'password'>
    </div>
</div>
</div>
</div>
</form>
</body>