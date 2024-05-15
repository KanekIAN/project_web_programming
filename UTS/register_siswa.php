<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Siswa</title>
</head>
<body>
  

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="navbar-nav mx-auto">
            <h1 style="color : white;">Registrasi Siswa</h1>
        </div>
</nav>

<br/><a href ="halaman_siswa.php"><h5 class="text-center" a href="index.php">Jika sudah melakukan registrasi maka tidak perlu lagi dan silahkan kembali dengan menekan tulisan ini</h5></a>
<h5 class="text-center">Silahkan isi form dibawah untuk mendaftarkan siswa</h5><br/>

<div class="d-grid gap-2 col-6 mx-auto">

<div class="mb-3">
<form action="proses_data_siswa.php" method="post" enctype="multipart/form-data">
  <label for="nama"><b>Nama Lengkap</b></label>
  <input type="text" name ="nama" class="form-control" required><br/>

  <label for="tempat_lahir"><b>Tempat Lahir</b></label>
  <input type="text" name ="tempat_lahir" class="form-control" required><br/>

  <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
  <input type="date" name ="tanggal_lahir" class="form-control" required><br/>

  <label for="alamat"><b>Alamat</b></label>
  <input type="text" name ="alamat" class="form-control" required><br/>
 
  <!-- <label for="koordinat">Koordinat Tempat Tinggal</label>
  <input type="text" name ="koordinat" class="form-control"><br/> -->

  <label for="foto"><b>Pas Foto</b></label>
  <input type="file" name ="foto" class="form-control" required><br/>

  <label for="email"><b>Email</b></label>
  <input type="email" name ="email" class="form-control" required><br/>

  <label for="no_telp"><b>Nomor HP</b></label>
  <input type="text" name ="no_telp" class="form-control" required><br/>

  <label for="username"><b>Username Baru</b></label>
  <input type="text" name ="username" class="form-control" required><br/>

  <label for="password"><b>Password</b></label>
  <input type="password" name ="password" class="form-control" required><br/>
  
  <label for="confirm_password"><b>Confirm Password</b></label>
<input type="password" name ="confirm_password" class="form-control"><br/>

<button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
<button type="submit" class="btn btn-primary btn-block"><b>Submit Data</b></button><br/><br/><br/><br/>

  </form>
</div>
</div>


</body>
</html>


