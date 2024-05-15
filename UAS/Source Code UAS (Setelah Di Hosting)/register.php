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

<header class="bg-info text-white text-center py-3">
    <h1>PENDAFTARAN PASIEN</h1>
</header>

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
        <div class="card custom-card">
                <div class="card-body">
                <h4 class="card-title text-center">Silahkan mengisi form biodata berikut untuk membuat akun</h4>

                    <form action="register_process.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name ="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" name ="tempat_lahir" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name ="tanggal_lahir" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor HP</label>
                            <input type="number" name ="no_telp" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name ="alamat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name ="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name ="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" name ="confirm_password" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-info text-white"><b>Submit</b></button>
                        </div>

                        <br/>

                        <div class="text-center">
                            <button  type="button" class="btn btn-info text-white" onclick="goBack()"><b>Kembali</b></button>
                        </div>

                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<footer class="bg-info text-white py-3 text-center border-top" >
    <p>&copy; <b>2023 Klinik Kita Sehat. All rights reserved.</b></p>
</footer>


</body>
</html>
