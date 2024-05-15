<?php
$kunci = mysqli_connect("localhost", "id20897658_uaswebprog", "_jRxR-B2)\!hOGnx", "id20897658_uas_webprog");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['delete'])) {
    $doctorId = $_POST['delete'];

    $deleteStmt = mysqli_prepare($kunci, "DELETE FROM dokter WHERE id = ?");
    mysqli_stmt_bind_param($deleteStmt, "i", $doctorId);
    mysqli_stmt_execute($deleteStmt);
    mysqli_stmt_close($deleteStmt);
}

$query = "SELECT COUNT(*) as count FROM dokter";
$result = mysqli_query($kunci, $query);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

//5 DATA DEFAULT DARI DOKTER
//JIKA 5 DATA DEFAULT DOKTER INI DIHAPUS, MAKA AKAN OTOMATIS INSERT ULANG 5 DATA DOKTERNYA
if ($count == 0) {
    $stmt = mysqli_prepare($kunci, "INSERT INTO dokter (id, nama_dokter, jenis_dokter, jadwal_dokter, foto) VALUES (?, ?, ?, ?, ?)");

    $doctors = [
        [
            'id' => 1,
            'nama_dokter' => 'Dr. Natasha',
            'jenis_dokter' => 'Umum',
            'foto' => 'gambar/natasha.jpg',
        ],
        [
            'id' => 2,
            'nama_dokter' => 'Dr. Bailu',
            'jenis_dokter' => 'Spesialis',
            'foto' => 'gambar/bailu.jpg',
        ],
        [
            'id' => 3,
            'nama_dokter' => 'Dr. Bennet',
            'jenis_dokter' => 'Umum',
            'foto' => 'gambar/bennet.png',
        ],
        [
            'id' => 4,
            'nama_dokter' => 'Dr. Barbara',
            'jenis_dokter' => 'Umum',
            'foto' => 'gambar/barbara.png',
        ],
        [
            'id' => 5,
            'nama_dokter' => 'Dr. Jean',
            'jenis_dokter' => 'Spesialis',
            'foto' => 'gambar/jean.jpg',
        ],
    ];

    foreach ($doctors as $doctor) {
        $fotoData = file_get_contents($doctor['foto']);
        $fotoData = base64_encode($fotoData);

        mysqli_stmt_bind_param($stmt, "isssb", $doctor['id'], $doctor['nama_dokter'], $doctor['jenis_dokter'], $doctor['jadwal_dokter'], $fotoData);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
} 

$query = "SELECT * FROM dokter";
$result = mysqli_query($kunci, $query);

if ($result) {
    $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $doctors = [];
}

mysqli_close($kunci);
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
           <a class="navbar-brand" href="halaman_berkas.php">Berkas Janji Pasien</a>
           <a class="navbar-brand" href="data_pasien.php">Data Pasien</a>  
           <a class="navbar-brand" href="profile_admin.php">Profil Admin</a>
               
        </div>
    </nav>

    <header class="bg-danger text-white text-center py-3">
        <h1>ADMIN</h1>
    </header>

    <div class="container mt-4">
        <h2>Informasi Dokter</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Dokter</th>
                    <th>Jenis Dokter</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor) : ?>
                <tr>
                    <td><?= $doctor['id'] ?></td>
                    <td><?= $doctor['nama_dokter'] ?></td>
                    <td><?= $doctor['jenis_dokter'] ?></td>
                    <td><img src="<?= $doctor['foto'] ?>" width="100" height="100" alt="<?= $doctor['nama_dokter'] ?>"></td>
                    <td>
                        <form method="post" onsubmit="return confirm('Are you sure you want to delete this doctor?')">
                            <input type="hidden" name="delete" value="<?= $doctor['id'] ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="d-grid gap-2 col-6 mx-auto">
        <a button class="btn btn-danger custom-card" type="button" href="tambah_dokter.php">Tambah Dokter Baru</a>
        <a button class="btn btn-danger custom-card" type="button" href="index.php">Log Out</a>
        <br/><br/><br/>
    </div>

    </div>

</body>
</html>
