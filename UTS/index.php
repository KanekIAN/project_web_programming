<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SMPN UMN</title>
</head>

<body>
    <div class="card text-center">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004f68;">
    <a class="navbar-brand" href="#">
        <img src="resource_foto/tutwuri.png" alt="Logo" style="height: 80px;">   
    </a>

    <style>
  .nav-item.active {
    border-bottom: 3px solid white; 
  }
  .nav-link {
    position: relative;
  }
  .nav-link::before {
    content: "";
    position: absolute;
    bottom: -3px; 
    left: 0;
    width: 0%;
    height: 3px; 
    background-color: white; 
    transition: width 0.3s ease-out; 
  }
  .nav-link:hover::before,
  .nav-link:focus::before {
    width: 100%; 
  }
</style>

<div class="navbar-nav ml-auto">
  <a class="nav-item nav-link font-weight-bold active" href="#"><strong>HOME</strong></a>
  <a class="nav-item nav-link" href="halaman_siswa.php">SISWA</a>
  <a class="nav-item nav-link" href="halaman_admin.php">ADMIN</a>
</div>

</nav>
        <div class="card text-center">
          
            <div class="card-header">
                <div style="text-align: center;">
</div>
               
<h1>PENDAFTARAN SISWA BARU SMPN UMN</h1>

  <div class="card-body">
    <h5 class="card-title">Total Siswa yang mendaftar</h5>
    <div class="h5 mb-0 font-weight-bold text-gray-800">
    <?php
    require 'db_config.php';

    $query = "SELECT id FROM siswa ORDER BY id";
    $query_run = mysqli_query($connection, $query);

    $row = mysqli_num_rows($query_run);

    if ($row < 200) {
        echo "<h1> $row/200</h1>";
        echo '<h5> Silahkan menuju Halaman Siswa untuk melakukan pendafatran</h5>';
    } else {
        echo '<h5> Kapasitas Pendaftaran Telah Penuh</h5>';
    }
?>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
<div class="col">
  <a href="halaman_siswa.php">
    <div class="card h-100" style="background-color: #0B7698">
      <div class="card-body button-hover" style="padding: 50px 0;">
        <h3 class="card-text" style="color: white;">Halaman Siswa</h3>
      </div>
    </div>
  </a>
</div>

  <div class="col">
    <a href="halaman_admin.php">
      <div class="card h-100" style="background-color: #0B7698">
        <div class="card-body button-hover" style="padding: 50px 0;">
          <h3 class="card-text" style="color: white;">Halaman Admin</h3>
        </div>
      </div>
    </a>
  </div>
<br/>
</div>
</div>
</div>

<style>
  .button-hover:hover {
    background-color: #0F52BA;
    animation-name: button-pulse;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
  }

  @keyframes button-pulse {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
    100% {
      transform: scale(1);
    }
  }
</style>

<br/><div class="row">
<h4>About SMPN UMN</h4>
  <div class="col-sm-12 col-md-6 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Visi</h5>
        <p class="card-text">Menjadi sekolah unggulan di bidang ICT, yang menghasilkan lulusan berwawasan internasional dan berkompetensi tinggi di bidangnya (berkeahlian) yang disertai jiwa wirausaha serta berbudi pekerti luhur.</p>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-6 mb-3">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Misi</h5>
        <p class="card-text">Mencerdaskan kehidupan bangsa dan memajukan kesejahteraan bangsa melalui upaya penyelenggaraan pendidikan yang melaksanakan tridarma (pendidikan, penelitian, dan pengabdian masyarakat) untuk meningkatkan kualitas sumber daya Indonesia.</p>
      </div>
    </div>
  </div>
</div><br/><br/>



<footer class="bg-info text-light fixed-bottom p-3" style="padding: 10px 0; font-size: 8px; background-color: #0B7698;">
  
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