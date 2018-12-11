<?php
    require 'functions.php';
    if(isset($_POST['submit'])){
        if(edit($_POST) > 0){
            echo "
            <script>
                alert('data berhasil diperbaharui');
                document.location.href='index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal diperharui');
                document.location.href='edit.php';
            </script>
            ";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
    $id=$_GET[id];
    $mhs=query("SELECT *FROM mahasiswa WHERE id=$id")[0];
    // var_dump($id);
    // var_dump($mhs[0]["Nama"]);
    // var_dump($mhs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Update Data</title>
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
    </nav>
    <h1>Update Data Mahasiswa</h1>
    <br>
    <form action="" method="post" class="form-inline" role="form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs[id] ?>">

    <input type="hidden" name="GambarLama" value="<?= $mhs[Gambar]; ?>">
        <div class="form-group">
            <label for="Nama" class="col-sm-1 control-label">Nama</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Nama" id="Nama" value="<?= $mhs[Nama]; ?>">
                </div>

            <label for="Nim" class="col-sm-1 control-label">NIM</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Nim" id="Nim" required value="<?= $mhs[Nim]; ?>">
                </div>

            <label for="Email" class="col-sm-1 control-label">Email</label>
                <div class="col-sm-11">
                <input type="text" class="form-control" name="Email" id="Email" required value="<?= $mhs[Email]; ?>">
                </div>

            <label for="Jurusan" class="col-sm-1 control-label">Jurusan</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="Jurusan" id="Jurusan" required value="<?= $mhs[Jurusan]; ?>">
            </div>

            <label for="Gambar" class="col-sm-1 control-label">Gambar</label>
            <div class="col-sm-11">
            <img src="image/<?= $mhs[Gambar];?>" alt="" height="100" width="100"><br>
            <input type="file" class="form-control" name="Gambar" id="Gambar" required value="<?= $mhs[Gambar]; ?>">
            </div>
        </div>
        <!-- <button type="submit" class="btn btn-primary" style="float: right; margin-right: 5%; margin-top: 2%">Submit</button> -->
    
        <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 20%; margin-top: 2%">Update</button>
    </form>

    <!-- <form action="" method="post">
    <li>
        <input type="hidden" name="id" value="<?= $mhs[id] ?>">
    </li>
        <ul>
            <li>
                <label for="Nama">Nama: </label>
                <input type="text" name="Nama" id="Nama" value="<?= $mhs[Nama]; ?>">
            </li>
            <li>
                <label for="Nim">NIM: </label>
                <input type="text" name="Nim" id="Nim" required value="<?= $mhs[Nim]; ?>">
            </li>
            <li>
                <label for="Email">Email: </label>
                <input type="text" name="Email" id="Email" required value="<?= $mhs[Email]; ?>">
            </li>
            <li>
                <label for="Jurusan">Jurusan: </label>
                <input type="text" name="Jurusan" id="Jurusan" required value="<?= $mhs[Jurusan]; ?>">
            </li>
            <li>
                <label for="Gambar">Gambar: </label>
                <input type="text" name="Gambar" id="Gambar" required value="<?= $mhs[Gambar]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update</button>
            </li>
        </ul>
    </form> -->
</body>
</html>