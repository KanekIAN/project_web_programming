<?php

$error_message = "";
  $username = $_POST['username'];
  $password = $_POST['password'];

  $dsn = "mysql:host=localhost;dbname=id20897658_uas_webprog";
  $kunci = new PDO($dsn, "id20897658_uaswebprog", "_jRxR-B2)\!hOGnx");

  $stmt = $kunci->prepare("SELECT * FROM pasien WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    
    session_start();

   
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
 
    
    header("Location: halaman_pasien.php");
    exit();
  } else {
    
    $error_message = "<center><h2>Username atau Password Anda Salah!</h2></center>";
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

        <?php if ($error_message !== ''): ?>
            <div class="alert alert-danger text-center" role="alert">
                <h4><?php echo $error_message; ?></h4>
            </div>
            <?php endif; ?>

        <br/><br/>
        <a button class="btn btn-primary custom-card" type="button" onclick="goBack()">Kembali</a>
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

<br/><br/>
<footer class="bg-info text-white py-3 text-center border-top" style="position: fixed; bottom: 0; width: 100%;">
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>

</body>
</html>
