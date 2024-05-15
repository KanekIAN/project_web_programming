<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  $dsn = "mysql:host=localhost;dbname=uts_webprog";
  $kunci = new PDO($dsn, "root", "");

  $stmt = $kunci->prepare("SELECT * FROM siswa WHERE username = ?");
  $stmt->execute([$username]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    
    session_start();

   
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
 
    
    header("Location: dashboard_siswa.php");
    exit();
  } else {
    
    echo "<center><h2>Username atau Password salah!</h2></center>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Login</title>
</head>
<body>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="d-grid gap-2 col-6 mx-auto">
<br/><a button class="btn btn-primary" type="button" onclick="goBack()">Coba Login Lagi</a>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>
    


</body>
</html>
