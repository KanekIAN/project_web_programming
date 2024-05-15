<?php
$dsn = "mysql:host=localhost;dbname=uas_webprog";
$kunci = new PDO($dsn, "root", "");

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM pasien WHERE id = ?";
    $stmt = $kunci->prepare($sql);
    $stmt->execute([$id]);
}

$sql = "SELECT * FROM pasien";
$stmt = $kunci->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        <h1>Data Pasien</h1>
    </header>

    <div class="container mt-4">
        <?php if (!empty($records)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $row): ?>
                        <tr>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['tempat_lahir']; ?></td>
                            <td><?php echo $row['tanggal_lahir']; ?></td>
                            <td><?php echo $row['no_telp']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td>
                                <form method="post" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                    <input type="hidden" name="delete" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data pasien.</p>
        <?php endif; ?>

        <div class="d-grid gap-2 col-6 mx-auto">
        <a button class="btn btn-danger custom-card" type="button" href="halaman_admin.php">Kembali</a>
    </div>

    </div>
    
</body>
</html>
