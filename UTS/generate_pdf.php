<?php
require_once('vendor/tecnickcom/tcpdf/tcpdf.php');

session_start();
if(!isset($_SESSION["username"])){
    header("Location: login_siswa.php");
    exit();
}

$dsn = "mysql:host=localhost;dbname=uts_webprog";
$db_username = "root";
$db_password = "";
$pdo = new PDO($dsn, $db_username, $db_password);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Siswa Data');
$pdf->SetSubject('Exporting Siswa Data to PDF');

$pdf->AddPage();

$pdf->SetFont('times', 'B', 16);

$stmt = $pdo->prepare("SELECT * FROM siswa WHERE username = ?");
$stmt->execute([$_SESSION["username"]]);
$user = $stmt->fetch();

$image_file = $user["foto"];
$image_content = file_get_contents($image_file);
$image_data = base64_encode($image_content);

$pdf->writeHTMLCell(0, 0, '', '', "<h1>Kartu Siswa, " . $_SESSION["username"] . "</h1>", 0, 1, false, true, 'C');
$pdf->Image('@'.$image_data, '', '', 80, 80, '', '', '', false, 300, '', false, false, 0, false, false, false);
$pdf->WriteHTML("<p><b>Nama :</b> " . $user["nama"] . "</p>");
$pdf->WriteHTML("<p><b>Alamat :</b> " . $user["alamat"] . "</p>");
$pdf->WriteHTML("<p><b>Email :</b> " . $user["email"] . "</p>");

$pdf->Output('Kartu Siswa.pdf', 'D');
