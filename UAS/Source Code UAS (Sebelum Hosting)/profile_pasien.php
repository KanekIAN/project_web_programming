<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Klinik Kita Sehat</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between ">
        <a class="navbar-brand" href="halaman_pasien.php"><b>KLINIK KITA SEHAT</b></a>
    </div>
</nav>

<header class="bg-info text-white text-center py-3">
<h1 style="color: white;">Profil</h1>
</header>




<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card custom-card">
                <div class="card-body text-center">
                    <h3 class="card-title">Informasi Anda</h3>
                    <br/>

                    <?php
                    $dsn = "mysql:host=localhost;dbname=uas_webprog";
                    $db_username = "root";
                    $db_password = "";
                    $pdo = new PDO($dsn, $db_username, $db_password);
                    
                    $stmt = $pdo->prepare("SELECT * FROM pasien WHERE username = ?");
                    $stmt->execute([$_SESSION["username"]]);
                    $user = $stmt->fetch();
                    
                    echo "<p><strong>Nama Lengkap:</strong> " . $user["nama"] . "</p>";
                    echo "<p><strong>Tempat Lahir:</strong> " . $user["tempat_lahir"] . "</p>";
                    echo "<p><strong>Tanggal Lahir:</strong> " . $user["tanggal_lahir"] . "</p>";
                    echo "<p><strong>No Telp:</strong> " . $user["no_telp"] . "</p>";
                    echo "<p><strong>Alamat:</strong> " . $user["alamat"] . "</p>";
                    echo "<p><strong>Username:</strong> " . $user["username"] . "</p>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .custom-card {
    background-color: #DDEEF0;
    color: dark;
}
</style>

<div class="d-grid gap-2 col-6 mx-auto">
        <a button class="btn btn-info custom-card" type="button" href="halaman_pasien.php">Kembali</a>
    </div>

<footer class="bg-info text-white py-3 text-center border-top" style="position: fixed; bottom: 0; width: 100%;">
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>

</body>
</html>
