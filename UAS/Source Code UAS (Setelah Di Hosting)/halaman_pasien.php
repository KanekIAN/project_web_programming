<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$kunci = mysqli_connect("localhost", "id20897658_uaswebprog", "_jRxR-B2)\!hOGnx", "id20897658_uas_webprog");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$query = "SELECT * FROM dokter";
$result = mysqli_query($kunci, $query);

if ($result) {
    $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $doctors = [];
}

mysqli_close($kunci);


$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

if (strcasecmp($sort, 'umum') === 0) {
    $filteredDoctors = array_filter($doctors, function ($doctor) {
        return strcasecmp($doctor['jenis_dokter'], 'Umum') === 0;
    });
} elseif (strcasecmp($sort, 'spesialis') === 0) {
    $filteredDoctors = array_filter($doctors, function ($doctor) {
        return strcasecmp($doctor['jenis_dokter'], 'Spesialis') === 0;
    });
} else {
    $filteredDoctors = $doctors;
}
?>

<?php
$dsn = "mysql:host=localhost;dbname=id20897658_uas_webprog";
$db_username = "id20897658_uaswebprog";
$db_password = "_jRxR-B2)\!hOGnx";
$pdo = new PDO($dsn, $db_username, $db_password);

$stmt = $pdo->prepare("SELECT * FROM pasien WHERE username = ?");
$stmt->execute([$_SESSION["username"]]);
$user = $stmt->fetch();
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between ">
        <a class="navbar-brand" href="halaman_pasien.php"><b>KLINIK KITA SEHAT</b></a>
        <a class="navbar-brand" href="profile_pasien.php">Profil Anda</a>
        <a class="navbar-brand" href="jadwal_bertemu_pasien.php">Jadwal Bertemu Dokter</a>
    </div>
</nav>

<body>

    <header class="bg-info text-white text-center py-3">
        <h1 style="color: white;">Halo, <?php echo $_SESSION["username"]; ?>!</h1>
        <h3 style="color: white;">Ada apa hari ini?</h3>
    </header>

</br>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a button class="btn btn-info text-white" type="button" href="buat_janji.php"><b>BUAT JANJI DENGAN DOKTER</b></a>
    </div>

    <div class="container mt-4 text-center">
        <h3>Daftar Dokter</h3>

        <div class="mb-3">
            <a href="?sort=" class="btn btn-primary text-white">Semua</a>
            <a href="?sort=umum" class="btn btn-primary text-white">Umum</a>
            <a href="?sort=spesialis" class="btn btn-primary text-white">Spesialis</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Dokter</th>
                    <th>Jenis Dokter</th>
                    <th>Foto</th>
                    <th>Review Terakhir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredDoctors as $doctor) : ?>
                    <tr>
                        <td><?= $doctor['nama_dokter'] ?></td>
                        <td><?= $doctor['jenis_dokter'] ?></td>
                        <td><img src="<?= $doctor['foto'] ?>" width="100" height="100" alt="<?= $doctor['nama_dokter'] ?>"></td>
                        <td><?= $doctor['review'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
    <a button class="btn btn-info text-white" type="button" href="review.php"><b>Berikan Review Pada Dokter</b></a>
        <a button class="btn btn-danger text-white" type="button" href="index.php">Log Out</a>
    </div>
    <br/>

</body>

</html>
