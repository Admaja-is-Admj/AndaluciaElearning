<?php
    require 'functions.php';

    session_start();
    if(!isset($_SESSION["login"])){
        echo $_SESSION["login"];
        header("Location:login.php");
        exit;
    }

    if(isset($_POST['submit'])){
        // var_dump($_POST);
        // var_dump($_FILES);
        // die();
        if(tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil disimpan');
                    document.location.href='index.php';
                </script>
                ";
        } else {
            echo "
            <script>
                alert('data gagal disimpan');
                document.location.href='index.php';
            </script>";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Tambah data</title>
    </head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" class="active" href="index.php">Daftar Mahasiswa</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="tambah_data.php">Tambah Data Mahasiswa</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

        <h1 class="text-center">Tambah Data Mahasiswa</h1>

    
    <form action="" method="post" class="form-inline" role="form" enctype="multipart/form-data">
    
        <!-- <div class="form-group">
            <label for="" class="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div>
        <br>
        <div class="form-group">
            <label for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div>
        <br>
        <div class="form-group">
            <label for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div>
        <br>
        <div class="form-group">
            <label for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div>
        <br>
        <div class="form-group">
            <label for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div> -->
        

        <div class="form-group">
            <label for="Nama" class="col-sm-1 control-label">Nama</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama" required>
                </div>

            <label for="Nim" class="col-sm-1 control-label">NIM</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Nim" id="Nim" placeholder="NIM" required>
                </div>

            <label for="Email" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" required>
                </div>

            <label for="Jurusan" class="col-sm-1 control-label">Jurusan</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Jurusan" id="Jurusan" placeholder="Jurusan" required>
            </div>

            <label for="Gambar" class="col-sm-1 control-label">Gambar</label>
            <div class="col-sm-11">
                <input type="file" class="form-control" name="Gambar" id="Gambar" placeholder="Gambar" required>
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary" style="float: right; margin-right: 5%; margin-top: 2%">Submit</button> -->
    
        <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 20%; margin-top: 2%">Submit</button>
    </form>
    
        <!-- <form action="" method="post">
            <ul>
                <li>
                    <label for="Nama">Nama:</label>
                    <input type="text" name="Nama" id="Nama" required>
                </li>
                <li>
                    <label for="Nim">NIM:</label>
                    <input type="text" name="Nim" id="Nim" required>
                </li>
                <li>
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email" required>
                </li>
                <li>
                    <label for="Jurusan">Jurusan</label>
                    <input type="text" name="Jurusan" id="Jurusan" required>
                </li>
                <li>
                    <label for="Gambar">Gambar</label>
                    <input type="text" name="Gambar" id="Gambar" required>
                </li>
                <li>
                    <button type="submit" name="submit"> Tambah </button>
                </li>
            </ul>
        </form> -->
    </body>
</html>