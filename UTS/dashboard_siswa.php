<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: login_siswa.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="navbar-nav mx-auto">
        <h1 style="color: white;">Login sebagai, <?php echo $_SESSION["username"]; ?></h1>
    </div>
</nav>

<div class="container my-4">
    <div class="card">
        <h3 class="card-header text-center">Profil Siswa</h3>
        <div class="card-body">
    <?php
                
        $dsn = "mysql:host=localhost;dbname=uts_webprog";
        $db_username = "root";
        $db_password = "";
        $pdo = new PDO($dsn, $db_username, $db_password);

        $stmt = $pdo->prepare("SELECT * FROM siswa WHERE username = ?");
        $stmt->execute([$_SESSION["username"]]);
        $user = $stmt->fetch();

        echo "<div class='text-center text-justify'>";
        echo "<img src='" . $user["foto"] . "' width='150'><br><br>";
        echo "<p><b>Nama :</b> " . $user["nama"] . "</p>";
        echo "<p><b>Alamat :</b> " . $user["alamat"] . "</p>";
        echo "<p><b>Email :</b> " . $user["email"] . "</p>";
        echo "</div>";
    ?>
</div>

<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        font-size: 1.2rem;
        background-color: #3A61BF;
        transition: background-color 0.2s ease-in-out;
    }
    
    .btn:hover {
        background-color: #1D3557;
    }
    
    @media screen and (max-width: 768px) {
        .btn {
            font-size: 1rem;
            padding: 8px 16px;
        }
    }
</style>

<a class="btn btn-primary btn-lg btn-block" href="generate_pdf.php">Cetak Kartu Siswa</a><br/>
<br/>


        <form action="halaman_siswa.php" method="post">
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
    </div>
</div>

</body>
</html>
