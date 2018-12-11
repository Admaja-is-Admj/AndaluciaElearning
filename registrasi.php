<?php
    require 'functions.php';

    if(isset($_POST['register'])){
        if(registrasi($_POST) > 0){
            echo "
                <style>
                    alert('user berhasil ditambahkan');
                </style>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Registrasi</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
<div class="col-md-4 col-md-offset-4 form-login">
<div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>
            <form action="send_register.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Registrasi</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="nickname" placeholder="Nama">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="repassword" placeholder="Re-Password">
                </div>

                <input type="submit" class="btn btn-block btn-custom-green" value="REGISTER" />
                
                <div class="text-center forget">
                    <p>Back To <a href="./login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>