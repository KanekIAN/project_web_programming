<?php
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $minimum_username = 6; 
    $minimum_password = 8;

    if (strlen($username) < $minimum_username) {
        $errorMessage = "Username yang anda masukan terlalu pendek. Masukan minimal 6 karakter!";
    } elseif (strlen($password) < $minimum_password) {
        $errorMessage = "Password yang anda masukan terlalu pendek. Masukan minimal 8 karakter!";
    } elseif ($password !== $confirm_password) {
        $errorMessage = "Password dan Confirm password tidak sama!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $hashed_confirm_password = password_hash($password, PASSWORD_DEFAULT);

        $dsn = "mysql:host=localhost;dbname=id20897658_uas_webprog";
        $kunci = new PDO($dsn, "id20897658_uaswebprog", "_jRxR-B2)\!hOGnx");

        $sql = "INSERT INTO pasien (nama, tempat_lahir, tanggal_lahir, no_telp, alamat, username, password, confirm_password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $kunci->prepare($sql);
        $data = [$nama, $tempat_lahir, $tanggal_lahir, $no_telp, $alamat, $username, $hashed_password, $hashed_confirm_password];
        $stmt->execute($data);

        $successMessage = "Data telah terdaftar! Silahkan kembali ke halaman utama";
    }
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

<body style="background-image: url('gambar/1.jpg'); background-size: cover; background-position: center;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex justify-content-between ">
        <a class="navbar-brand" href="index.php"><b>KLINIK KITA SEHAT</b></a>
    </div>
</nav>

<section class="container my-5">
    <div class="d-grid gap-2 col-6 mx-auto">
    <div class="card">

        <?php if ($errorMessage !== ''): ?>
            <div class="alert alert-danger text-center" role="alert">
                <h4><?php echo $errorMessage; ?></h4>
            </div>
        <?php elseif ($successMessage !== ''): ?>
            <div class="alert alert-success text-center" role="alert">
                <h4><?php echo $successMessage; ?></h4>
            </div>
        <?php endif; ?>

        <br/><br/>
        <a button class="btn btn-primary custom-card" type="button" onclick="goBack()">Kembali ke FORM PENDAFTARAN</a>
        <br/>
        <a button class="btn btn-primary custom-card" type="button" href="index.php">Kembali ke HALAMAN UTAMA</a>
        <br/><br/><br/>

    </div>
</div>

</section>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<style>
    .custom-card {
        background-color: #DDEEF0;
        color: #000000;
    }
</style>

<footer class="bg-info text-white py-3 text-center border-top" style="position: fixed; left: 0; bottom: 0; width: 100%;">
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>

</body>
</html>
