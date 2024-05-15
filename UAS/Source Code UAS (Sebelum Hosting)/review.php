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

$query = "SELECT * FROM dokter";
$result = mysqli_query($kunci, $query);

if ($result) {
    $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $doctors = [];
}

mysqli_close($kunci);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $doctorName = $_POST["doctor_name"];
    $review = $_POST["review"];

    $dsn = "mysql:host=localhost;dbname=uas_webprog";
    $db_username = "root";
    $db_password = "";
    $pdo = new PDO($dsn, $db_username, $db_password);

    $stmt = $pdo->prepare("UPDATE dokter SET review = ? WHERE nama_dokter = ?");
    $stmt->execute([$review, $doctorName]);

    header("Location: halaman_pasien.php");
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
    <title>Beri Ulasan untuk Dokter</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between ">
        <a class="navbar-brand" href="halaman_pasien.php"><b>KLINIK KITA SEHAT</b></a>
    </div>
</nav>

<header class="bg-info text-white text-center py-3">
    <h1 style="color: white;">Beri Ulasan untuk Dokter</h1>
</header>


<div class="container mt-4">
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <div class="mb-3">
            <label for="doctor_name" class="form-label">Pilih Dokter:</label>
            <select class="form-select" id="doctor_name" name="doctor_name" required>
                <?php foreach ($doctors as $doctor) : ?>
                    <option value="<?php echo $doctor['nama_dokter']; ?>"><?php echo $doctor['nama_dokter']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="review" class="form-label">Ulasan:</label>
            <textarea class="form-control" id="review" name="review" required></textarea>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" class="btn btn-info text-white"><b>Kirim Ulasan</b></button>
            <a button class="btn btn-info text-white" href="halaman_pasien.php">Kembali</a>
        </div>

    </form>
</div>


<footer class="bg-info text-white py-3 text-center border-top" style="position: fixed; bottom: 0; width: 100%;">
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>
</body>

</html>
