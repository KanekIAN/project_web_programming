<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$kunci = mysqli_connect("localhost", "root", "", "uas_webprog");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$username = $_SESSION["username"]; 
$query = "SELECT * FROM janji WHERE nama_pasien = '$username'"; 
$result = mysqli_query($kunci, $query);

if ($result) {
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $appointments = [];
}

mysqli_close($kunci);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Jadwal Anda</title>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between ">
        <a class="navbar-brand" href="halaman_pasien.php"><b>KLINIK KITA SEHAT</b></a>
    </div>
</nav>


<body>

<header class="bg-info text-white text-center py-3">
        <h1 style="color: white;">Jadwal Anda Bertemu Dokter</h1>
    </header>


    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Dokter</th>
                    <th>Tanggal Bertemu</th>
                    <th>Jam Bertemu</th>
                    <th>Keluhan</th>
                    <th>Status Pengajuan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment) : ?>
                    <tr>
                        <td><?php echo $appointment['nama_dokter']; ?></td>
                        <td><?php echo $appointment['tanggal_pertemuan']; ?></td>
                        <td><?php echo $appointment['jam_pertemuan']; ?></td>
                        <td><?php echo $appointment['keluhan']; ?></td>
                        <td><?php echo $appointment['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <a button class="btn btn-info text-white" href="halaman_pasien.php">Kembali</a>
    </div>


</body>

</html>
