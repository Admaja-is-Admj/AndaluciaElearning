<?php
session_start();
if(!isset($_SESSION["login"])){
    echo $_SESSION["login"];
    header("Location:login.php");
    exit;
}

require 'functions.php';

$mahasiswa=query("SELECT * FROM siswa");
if(isset($_POST["cari"])){
    $mahasiswa=cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Daftar Mahasiswa</title>
</head>

<body>
    <!-- <h1>Daftar Mahasiswa</h1> -->
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
        <!-- <a href="logout.php">Logout</a>
    <a href="tambah_data.php">Tambah Data Mahasiswa</a>
    <br><br> -->
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="tambah_data.php">Tambah Data Mahasiswa</a></li>
            </ul>
            <form class="navbar-form navbar-right" role="search" method="post">
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" autofocus placeholder="masukkan keyword pencarian">
                </div>
                <button type="submit" name=cari class="btn btn-default">Cari</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <!-- <a href="tambah_data.php">Tambah Data Mahasiswa</a> -->
        <!-- <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name=cari>cari</button>
        </form> -->
    <br>
    <table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama </th>
            <th>Nim </th>
            <th>Email </th>
            <th>Jurusan </th>
            <th>Gambar </th>
            <th>Aksi </th>
        </tr>
        <?php $i=1 ?>
        <!-- kita buat contoh data static -->
        <?php foreach ($mahasiswa as $row):?>
    </thead>
    <tbody>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
            </td>
        </tr>
        <?php $i++ ?>
    <?php endforeach;?>
    </tbody>
    </table>
    <!-- <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Nama </th>
            <th>Nim </th>
            <th>Email </th>
            <th>Jurusan </th>
            <th>Gambar </th>
            <th>Aksi </th>
        </tr>
        <?php $i=1 ?>
        <!-- kita buat contoh data static -->
        <!-- <?php foreach ($mahasiswa as $row):?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row["Nama"]; ?></td>
            <td><?= $row["Nim"]; ?></td>
            <td><?= $row["Email"]; ?></td>
            <td><?= $row["Jurusan"]; ?></td>
            <td> <img src="image/<?php echo $row["Gambar"]; ?>" alt="" height="100" width="100" srcset=""></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus?')">Hapus</a>
            </td>
        </tr>
    <?php $i++ ?>
    <?php endforeach;?> -->
    <!-- </table> -->
</body>
</html>