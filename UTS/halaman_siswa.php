<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SMPN UMN</title>
</head>
<body>


<div class="card text-center">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php"><img src="resource_foto/tutwuri.png" alt="Logo" style="height: 80px;"></a>

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
        <a class="nav-item nav-link" href="index.php">HOME</a>
        <a class="nav-item nav-link font-weight-bold active" href="#"><strong>SISWA</strong></a>
        <a class="nav-item nav-link" href="halaman_admin.php">ADMIN</a>
    </div>
</nav>


  <div class="card-header">
   <h1>Halaman Siswa</h1>
   <h5>Silahkan lakukan pendaftaran dan jika sudah maka dapat melakukan login siswa</h5>

   <br/><div class="d-flex justify-content-center">
  <div class="row row-cols-1 row-cols-md-3 g-4 text-center">

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

    <div class="col">
    <a href="register_siswa.php">
      <div class="card" style="background-color: #3A61BF  ">
        <div class="card-body w-100 button-hover">
          <h3 class="card-text" style="color: white;">Pendaftaran Siswa</h3>
        </div>
      </div>
      </a>
    </div>

    <div class="col">
    <a href="login_siswa.php">
      <div class="card" style="background-color: #3A61BF  ">
        <div class="card-body w-100 button-hover">
        <h3 class="card-text" style="color: white;">Login <br/>Siswa</h3>
        </div>
      </div>
      </a>
    </div>
    
    <div class="col">
    <a href="">
      <div class="card" style="background-color: #3A61BF   ">
        <div class="card-body w-100 button-hover">
        <h3 class="card-text" style="color: white;">Lupa Password</h3>
        </div>
      </div>
    </div>
    </a>
  </div>
</div>

<div class="card-body text-center">
    <h5 class="card-title">Total Siswa yang mendaftar</h5>
    <div class="h5 mb-0 font-weight-bold text-gray-800">
    <?php
    require 'db_config.php';

    $query = "SELECT id FROM siswa ORDER BY id";
    $query_run = mysqli_query($connection, $query);

    $row = mysqli_num_rows($query_run);

    if ($row < 200) {
        echo "<h1> $row/200</h1>";
        
    } else {
        echo '<h5> Kapasitas Pendaftaran Telah Penuh</h5>';
    }
    ?>
    </div>
</div>
</div>
</div>



<br/><br/><div class="row text-center">
<br/><div class="d-flex justify-content-center align-items-center">
  <div class="card text-center">
    <div class="card-body">
    <h4>Makna Seorang Siswa</h4>
      <p class="card-text">Siswa adalah orang yang datang ke sekolah untuk memperoleh pendidikan. 
        Pada masa ini siswa mengalami berbagai perubahan, baik fisik maupun psikis. 
        Selain itu juga berubah secara kognitif dan mulai mampu berpikir abstrak seperti orang dewasa. 
        Siswa adalah pelajar yang menjadi bagian dari pemuda bangsa yang menjadi penerus bangsa Indonesia. 
        Pelajar dituntut untuk bekerja keras dan belajar dengan giat demi meningkatkan kualitas dirinya.</p>
    </div>
  </div>
</div>

</div><br/><br/>



<footer class="bg-primary text-light fixed-bottom p-3" style="padding: 10px 0; font-size: 8px; background-color: #0B7698;">
  
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