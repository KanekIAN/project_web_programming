<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uts_webprog";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select all student data
    $sql = "SELECT * FROM siswa";
    $result = $conn->query($sql);

    $siswa = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $siswa[] = $row;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Data Calon Siswa</title>
    </head>
    <body>
        <h1>Data Calon Siswa</h1>

        <?php if(count($siswa) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Agama</th>
                        <th>Sekolah Asal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($siswa as $row) : ?>
                        <tr>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['tempat_lahir']; ?></td>
                            <td><?php echo $row['tanggal_lahir']; ?></td>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['agama']; ?></td>
                            <td><?php echo $row['sekolah_asal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Tidak ada data siswa yang ditemukan.</p>
        <?php endif; ?>
    </body>
</html>
