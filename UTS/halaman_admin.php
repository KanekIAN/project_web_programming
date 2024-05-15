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


<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
<a class="navbar-brand" href="index.php"><img src="resource_foto/tutwuri.png" alt="Logo" style="height: 80px;">   </a>
    <div class="navbar-nav ml-auto">

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

        <a class="nav-item nav-link" href="index.php">HOME</a>
        <a class="nav-item nav-link" href="halaman_siswa.php">SISWA</a>
        <a class="nav-item nav-link font-weight-bold active" href="#"><strong>ADMIN</strong></a>
    </div>
</nav>




  <div class="card-header">
   <h1>Halaman Admin</h1>

   <div class="d-flex justify-content-center">
  <div class="row row-cols-1 row-cols-md-3 g-4 text-center">

  <style>
  .button-hover:hover {
    background-color: #FF0000;
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
  <a href="login_admin.php" style="text-decoration: none;">
    <div class="card" style="background-color:#EC7063;">
      <div class="card-body w-100 button-hover">
        <h3 class="card-text" style="color: white;">Login Admin</h3>
      </div>
    </div>
  </a>
</div>

</div>
  </div>
</div>
</div>
  
<div class="text-center">
<h4>NOTE : Halaman ini tidak untuk diakses oleh siswa dan hanya untuk admin!</h4>
<p>Ian Pangeswara Hermawan (00000055622); Sinung Agung Cahyono (00000056197); Ferly Aorelio Ahuluheluw (00000062319); Rafi Aditya Sudarno (0000061311)</p>
<div class="text-center">
  

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