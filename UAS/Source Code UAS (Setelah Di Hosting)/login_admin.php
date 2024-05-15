<?php
$password = "admin123";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$kunci = mysqli_connect("localhost", "id20897658_uaswebprog", "_jRxR-B2)\!hOGnx", "id20897658_uas_webprog");

$query = "SELECT COUNT(*) as count FROM admin";

$result = mysqli_query($kunci, $query);
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

// SATU PASSWORD UNTUK SEMUA USERNAME ADMIN. ADA 4 ADMIN.
$admins = array(
    array('001', 'adminian', $hashed_password),
    array('002', 'adminrafi', $hashed_password),
    array('003', 'adminferly', $hashed_password),
    array('004', 'adminsinung', $hashed_password),
);

if ($count == 0) {
    $sql = "INSERT INTO admin (id, username_admin, password_admin) VALUES ";

    $values = array();
    foreach ($admins as $admin) {
        $values[] = "('" . implode("', '", $admin) . "')";
    }

    $sql .= implode(", ", $values);

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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Klinik Kita Sehat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
           <a class="navbar-brand" href="index.php"><b>KLINIK KITA SEHAT</b></a>
           <a class="navbar-brand" href="index.php">Pasien</a>
        </div>
    </nav>

    <header class="bg-danger text-white text-center py-3">
    <h1>ADMIN</h1>
</header>

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card custom-card">
                <div class="card-body">
                    <h4 class="card-title text-center">LOGIN ADMIN</h4>

                    <form action="login_admin_process.php" method="post">
                        <div class="mb-3">
                            <label for="username_admin" class="form-label">Username</label>
                            <input type="text" name ="username_admin" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_admin" class="form-label">Password</label>
                            <input type="password" name ="password_admin" class="form-control" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">Login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .custom-card {
    background-color: #F0DDDD;
    color: dark;
}

</style>

<footer class="bg-danger text-white py-3 text-center border-top" style="position: fixed; bottom: 0; width: 100%;">
    <p>&copy; 2023 Klinik Kita Sehat. All rights reserved.</p>
</footer>

</body>
</html>
