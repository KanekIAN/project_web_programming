<?php
require_once 'vendor/autoload.php';


session_start();
if(!isset($_SESSION["admin_username"])){
    header("Location: login_admin.php");
    exit();
}

if(isset($_POST['remove_user'])) {
    $user_id = $_POST['user_id'];
    $dsn = "mysql:host=localhost;dbname=uts_webprog";
    $db_username = "root";
    $db_password = "";
    $pdo = new PDO($dsn, $db_username, $db_password);
    $stmt = $pdo->prepare("DELETE FROM siswa WHERE id=:id");
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    header("Location: dashboard_admin.php");
    exit();
}

$dsn = "mysql:host=localhost;dbname=uts_webprog";
$db_username = "root";
$db_password = "";
$pdo = new PDO($dsn, $db_username, $db_password);
$stmt = $pdo->prepare("SELECT * FROM siswa");
$stmt->execute();
$siswas = $stmt->fetchAll();

if(isset($_POST['export_excel'])) {
    require_once 'vendor/autoload.php';
    $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Alamat');
    $sheet->setCellValue('D1', 'Email');
    $sheet->setCellValue('E1', 'Foto');

    $row = 2;
    foreach ($siswas as $key => $siswa) {
        $sheet->setCellValue('A'.$row, ($key + 1));
        $sheet->setCellValue('B'.$row, $siswa['nama']);
        $sheet->setCellValue('C'.$row, $siswa['alamat']);
        $sheet->setCellValue('D'.$row, $siswa['email']);
        $sheet->setCellValue('E'.$row, $siswa['foto']);
        
        $row++;
    }

    $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="Data Siswa SMPN UMPN.xlsx"');
    $writer->save('php://output');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="navbar-nav mx-auto">
        <h1 style="color: white;">Login sebagai, Admin <?php echo $_SESSION["admin_username"]; ?></h1>
    </div>
</nav>

<div class='text-center text-justify'>
    <table class='table'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswas as $key => $siswa) { ?>
            <tr>
                <td><?php echo ($key + 1); ?></td>
                <td><?php echo $siswa['nama']; ?></td>
                <td><?php echo $siswa['alamat']; ?></td>
                <td><?php echo $siswa['email']; ?></td>
                <td>
                    <?php if(!empty($siswa['foto'])) { ?>
                    <img src="<?php echo $siswa['foto']; ?>" height="50">
                    <?php } ?>
                </td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="user_id" value="<?php echo $siswa['id']; ?>">
                        <button type="submit" class="btn btn-danger" name="remove_user" onclick="return confirm('Are you sure?')">Remove</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


    <form method="post" action="">
        <button type="submit" class="btn btn-success" name="export_excel">Export to Excel</button>
    </form>

    <br/> <form action="halaman_admin.php" method="post">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
    
</div>

</body>
</html>

