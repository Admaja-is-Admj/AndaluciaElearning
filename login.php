<?php
session_start();
// if(isset($_COOKIE["login"])){
//     if($_COOKIE['login']=='true'){
//         $_SESSION['login']=true;
//     }
// }

// if(isset($_SESSION["login"])){
//     header("Location:index.php");
//     exit;
// }

require 'functions.php';

if(isset($_COOKIE['id']) && isset($_COOKIE['username'])){
    $id=$_COOKIE['id'];
    $key=$_COOKIE['key'];

    $result=mysqli_query($conn, "SELECT username FROM users WHERE id=$id");
    $row=mysqli_fetch_assoc($result);

    if($key === hash('sha256', $row['username'])){
        $_SESSION['login'] = true;
    }
}

if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $result=mysqli_query($conn, "SELECT *FROM users WHERE username='$username'");

    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"]=true;
            if(isset($_POST['remember'])){
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash(sha256, $row['username']), time()+60);
                setcookie('login','true',time()+60);
            }
            header("Location:index.php");
            exit;
        }
    }
    $error=true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="col-md-4 col-md-offset-4 from-login">
<div class="outter-form-login">
        <div class="logo-login">
            <img src="assets/images/logo.png" alt="">
            <!-- <em class="glyphicon glyphicon-user"></em> -->
        </div>
            <form action="check-login.php" class="inner-login" method="post">
            <h3 class="text-center title-login">Login Member</h3>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                
                <input type="submit" class="btn btn-block btn-custom-green" value="LOGIN" />
                
                <div class="text-center forget">
                    <p><a href="registrasi.php">Register</a> terlebih dahulu</p>
                </div>
            </form>
        </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>