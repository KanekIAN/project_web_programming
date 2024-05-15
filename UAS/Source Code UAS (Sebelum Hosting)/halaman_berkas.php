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

$query = "SELECT * FROM janji";
$result = mysqli_query($kunci, $query);

if ($result) {
    $appointments = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $appointments = [];
}

mysqli_close($kunci);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $status = $_POST["status"];
    $appointmentId = $_POST["appointment_id"];

    $kunci = mysqli_connect("localhost", "root", "", "uas_webprog");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "UPDATE janji SET status = '$status' WHERE id = '$appointmentId'";
    $updateResult = mysqli_query($kunci, $query);

    mysqli_close($kunci);

    if ($updateResult) {
        header("Location: halaman_berkas.php");
        exit();
    } else {
        echo "Failed to update status.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Klinik Kita Sehat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="halaman_admin.php"><b>KLINIK KITA SEHAT</b></a>
            <a class="navbar-brand" href="halaman_admin.php">Halaman Admin</a>
        </div>
    </nav>

    <header class="bg-danger text-white text-center py-3">
        <h1>Berkas Janji Pasien</h1>
    </header>

    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Dokter</th>
                    <th>Pasien</th>
                    <th>Tanggal Bertemu</th>
                    <th>Jam Bertemu</th>
                    <th>Keluhan</th>
                    <th>Status Pengajuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment) : ?>
                    <tr>
                        <td><?php echo $appointment['nama_dokter']; ?></td>
                        <td><?php echo $appointment['nama_pasien']; ?></td>
                        <td><?php echo $appointment['tanggal_pertemuan']; ?></td>
                        <td><?php echo $appointment['jam_pertemuan']; ?></td>
                        <td><?php echo $appointment['keluhan']; ?></td>
                        <td><?php echo $appointment['status']; ?></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
                                <?php if ($appointment['status'] === 'Menunggu') : ?>
                                    <button class="btn btn-success" type="submit" name="status" value="Diterima">Terima</button>
                                    <button class="btn btn-danger" type="submit" name="status" value="Ditolak">Tolak</button>
                                <?php else : ?>
                                    <button class="btn btn-success" type="button" disabled>Terima</button>
                                    <button class="btn btn-danger" type="button" disabled>Tolak</button>
                                <?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-danger custom-card" type="button" href="halaman_admin.php">Kembali</a>
    </div>
</body>
</html>
