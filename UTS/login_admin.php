<?php
//USER ADMIN DIBUAT DENGAN HARDCODE AGAR TIDAK ADA TEMPAT MENDAFTAR SEBAGAI ADMIN DAN HANYA BISA DIAKSES ADMIN
$password = "admin123";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$kunci = mysqli_connect("localhost", "root", "", "uts_webprog");

$query = "SELECT * FROM admin WHERE username_admin = 'smpnumn'";

$result = mysqli_query($kunci, $query);


if(mysqli_num_rows($result) == 0) {
  //USERNAME DAN PASSWORD DARI 1 ADMIN
    $sql = "INSERT INTO admin (id, username_admin, password_admin) VALUES ('001', 'smpnumn', '$hashed_password')";
    mysqli_query($kunci, $sql);
}

mysqli_close($kunci);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
</head>
<body>
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="navbar-nav mx-auto">
            <h1 style="color : white;">Login Admin</h1>
        </div>
</nav>

<div class="container my-4">
    <div class="card">
        <div class="card-body">
        <div class="d-grid gap-2 col-6 mx-auto">

<br/><div class="mb-3">

<form action="login_admin_process.php" method="post">
  <label for="username_admin"><b>Username</b></label>
  <input type="text" class="form-control" placeholder="Enter Username" name="username_admin" required><br/>

  <label for="password_admin"><b>Password</b></label>
  <input type="password" class="form-control" placeholder="Enter Password" name="password_admin" required>
  <br/>

  <button type="submit" class="btn btn-danger btn-block"><b>Login</b></button>
  <button type="button" class="btn btn-secondary btn-block" onclick="history.back()">Kembali</button>
  <div class="text-center">
</form>
<br/>
<p><b>NOTE : Halaman ini tidak untuk diakses oleh siswa dan hanya untuk admin!</p></b>
<div class="text-center">
</div>

</div>
</div>
</div>
</div>

<footer class="bg-danger text-light fixed-bottom p-3" style="padding: 10px 0; font-size: 8px; background-color: #0B7698;">
  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <div class="box">
    <div class="container text-center mx-auto" >
      <div class="row">
  
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="box-part">
          <a href="https://www.instagram.com/universitasmultimedianusantara/" style="color: white;">
    <i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
          </div>
        </div>	 
  
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="box-part">
          <a href="https://www.facebook.com/UniversitasMultimediaNusantara" style="color: white;">
    <i class="fa fa-facebook fa-3x" aria-hidden="true"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="box-part">
          <a href="https://www.linkedin.com/school/universitas-multimedia-nusantara/" style="color: white;">
    <i class="fa fa-linkedin fa-3x" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>		
    </div>
  </div>
</footer>





</body>
</html>
