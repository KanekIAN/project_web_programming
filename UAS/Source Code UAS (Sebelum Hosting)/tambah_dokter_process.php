<?php
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_dokter = $_POST['nama_dokter'];
    $jenis_dokter = $_POST['jenis_dokter'];

    if (strtolower($jenis_dokter) !== 'umum' && strtolower($jenis_dokter) !== 'spesialis') {
        $errorMessage = "Jenis Dokter harus 'Umum' atau 'Spesialis'!";
    }
    else {
        if (!is_dir("foto")) {
            mkdir("foto");
        }

        $filename = $_FILES['foto']['name'];
        $temp_file = $_FILES['foto']['tmp_name'];

        $file_ext = explode(".", $filename);
        $file_ext = end($file_ext);
        $file_ext = strtolower($file_ext);

        switch ($file_ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'svg':
            case 'webp':
            case 'bmp':
            case 'gif':
                move_uploaded_file($temp_file, "foto/{$filename}");
                break;
            default:
                break;
        }
        $foto = dirname("foto/$filename") . "/$filename";

            $dsn = "mysql:host=localhost;dbname=uas_webprog";
            $kunci = new PDO($dsn, "root", "");

            $sql = "INSERT INTO dokter (nama_dokter, jenis_dokter, foto)
                VALUES (?, ?, ?)";
            $stmt = $kunci->prepare($sql);
            $data = [$nama_dokter, $jenis_dokter, $foto];
            $stmt->execute($data);

            $successMessage = "Data Dokter Baru Telah Terdaftar!";
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

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
           <a class="navbar-brand" href="halaman_admin.php"><b>KLINIK KITA SEHAT</b></a>
               
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
        <a button class="btn btn-primary custom-card" href = "halaman_admin.php" type="button">Kembali</a>
        <br/>
        <br/><br/>

    </div>
</div>

</section>

<style>
    .custom-card {
        background-color: #DDEEF0;
        color: #000000;
    }
</style>

<footer class="bg-danger text-white py-3 text-center border-top" style="position: fixed; left: 0; bottom: 0; width: 100%;">
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>

</body>
</html>
