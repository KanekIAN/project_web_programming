<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Klinik Kita Sehat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
           <a class="navbar-brand" href="halaman_admin.php"><b>KLINIK KITA SEHAT</b></a>
               
        </div>
    </nav>

    <header class="bg-danger text-white text-center py-3">
        <h1>Tambah Dokter Baru</h1>
    </header>

    <section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
        <div class="card custom-card">
                <div class="card-body">

                    <form action="tambah_dokter_process.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" name ="nama_dokter" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_dokter" class="form-label">Jenis Dokter</label>
                            <input type="text" name ="jenis_dokter" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name ="foto" class="form-control" required>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-danger text-white"><b>Submit</b></button>
                        </div>

                        <br/>

                        <div class="text-center">
                            <button  type="button" class="btn btn-danger text-white" onclick="goBack()"><b>Kembali</b></button>
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

</body>
</html>