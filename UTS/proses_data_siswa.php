<?php
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    if (!is_dir("foto_siswa")) {
        mkdir("foto_siswa");
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
            move_uploaded_file($temp_file, "foto_siswa/{$filename}");
            break;
        default: 
            break;
    }
    $foto = dirname("foto_siswa/$filename")."/$filename";

    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $minimum_username = 6; 
    $minimum_password = 8;

    if (strlen($username) < $minimum_username) {
        echo "<center><h2>Username yang anda masukan terlalu pendek. Masukan minimal 6 karakter!</h2></center>";
    } else if (strlen($password) < $minimum_password) {
        echo "<center><h2>Password yang anda masukan terlalu pendek. Masukan minimal 8 karakter!</h2></center>";
    } else if ($password !== $confirm_password) {
        echo "<center><h2>Password dan Confirm password tidak sama!</h2></center>";
    } else { 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $hashed_confirm_password = password_hash($password, PASSWORD_DEFAULT);

        $dsn = "mysql:host=localhost;dbname=uts_webprog";
        $kunci = new PDO($dsn, "root", "");

        $sql = "INSERT INTO siswa (nama, tempat_lahir, tanggal_lahir, alamat, foto, email, no_telp, username, password, confirm_password)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $stmt = $kunci->prepare($sql);
              $data = [$nama, $tempat_lahir, $tanggal_lahir, $alamat, $foto, $email, $no_telp, $username, $hashed_password, $hashed_confirm_password];
              $stmt->execute($data);

              echo"<center><h2>Data anda telah terdaftar! Silahkan kembali ke halaman utama!</h2></center>";
    }      
          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="d-grid gap-2 col-6 mx-auto">
<br/><br/><a button class="btn btn-primary" type="button" onclick="goBack()">Kembali ke FORM PENDAFTARAN</a>
<a button class="btn btn-primary" type="button" href="index.php">Kembali ke HALAMAN UTAMA</a>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>
    


</body>
</html>
