<?php
    $conn = mysqli_connect("localhost", "root", "", "curriculumvitae");
    $qidentitas = mysqli_query($conn, "SELECT * FROM tbl_identitas");
?>
<html lang="en">
    <head>
        <title>Latihan</title>
    </head>
    <body>
        <h1 align="center">Data Curriculum Vitae</h1>
        <a href="data.php">Ke Halaman Menu</a> | <a href="input.php"><strong>Tambah Data Baru</strong></a>
        <br><br>
        <table border="1px" cellpadding="7" cellspacing="0">
            <tr bgcolor="#dcffd1">
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th width="25%">Alamat</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
            <?php $z = 1; ?>
            <?php foreach ($qidentitas as $identity) : ?>
                <tr>
                    <td><?= $z; ?></td>
                    <td><?= $identity["NIK"] ?></td>
                    <td><?= $identity["nama"] ?></td>
                    <td><?= $identity["Foto"] ?></td>
                    <td><?= $identity["TempatLahir"] ?></td>
                    <td><?= $identity["TanggalLahir"] ?></td>
                    <td><?= $identity["Alamat"] ?></td>
                    <td><?= $identity["Email"] ?></td>
                    <td><?= $identity["NoHp"] ?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="#">Edit</a> | 
                            <a href="delete.php?NIK=<?= $identity["NIK"] ?>" onclick="return confirm('Hapus data?');">Delete</a>
                            <a href="viewcv.php?NIK=<?= $identity["NIK"] ?>"> View </a>
                        </div>
                    </td>
                </tr>
            <?php $z++ ?>
            <?php endforeach ?>
        </table>
    </body>
</html>