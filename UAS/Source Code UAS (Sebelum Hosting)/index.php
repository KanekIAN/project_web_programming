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
        <a class="navbar-brand" href="#"><b>KLINIK KITA SEHAT</b></a>
        <a class="navbar-brand" href="login_admin.php">Admin</a>
    </div>
</nav>

<header class="bg-info text-white text-center py-3">
    <h1>Selamat Datang <br/>KLINIK KITA SEHAT</h1>
</header>

<section class="container my-5">
    <div class="row justify-content-center">
    <div class="col-md-4 fixed-size-box">
    <div class="card fixed-height-card custom-card">
        <div class="card-body">
            <h4 class="card-title text-center">Tentang Kami</h4>
            <div class="text-center mt-3">
             <p>KLINIK KITA SEHAT hadir sebagai layanan kesehatan yang lebih 
                nyaman dan lebih dekat dengan Anda. Pasien lebih mudah mendapat 
                pelayanan dokter umum dan spesialis dengan membuat janji.</p>
            </div>
        </div>
    </div>
</div>

        <div class="col-md-4 fixed-size-box">
            <div class="card custom-card">
                <div class="card-body">
                    <h4 class="card-title text-center">Kontak</h4>
                    <div class="text-center mt-3">
                    <p><br/>Email : kliniksehat@gmail.com<br/>
                Telp : 1234-4567<br/><br/></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 fixed-size-box">
            <div class="card custom-card">
                <div class="card-body">
                    <h4 class="card-title text-center">Alamat</h4>
                    <div class="text-center mt-3">
                    <p><br/>Jalan Scientia Boulevard Gading, Curug Sangereng, 
                        Serpong, Kabupaten Tangerang, Banten 15810<br/><br/></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card custom-card">
                <div class="card-body">
                    <h4 class="card-title text-center">LOGIN PASIEN</h4>



                    <form action="login_pasien_process.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-info text-white"><b>Login</b></button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <b><p>Belum memiliki Akun? <a href="register.php">Silahkan Daftar</a></p></b>
                        <b><a href="#">Lupa Password?</a></b>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .custom-card {
    background-color: #DDEEF0;
    color: dark;
}
</style>


<footer class="bg-info text-white py-3 text-center border-top" >
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>


</body>
</html>
