<?php
    if (isset($_GET['NIK'])) {
        $NIK = $_GET["NIK"];
    } else {
        die("Error. No ID Selected");
    }

    $conn = mysqli_connect("localhost", "root", "", "curriculumvitae");
    $query = mysqli_query($conn, "SELECT * FROM tbl_identitas WHERE NIK = '$NIK' ");
    $result = mysqli_fetch_array($query);

    $query_pendidikan = mysqli_query($conn, "SELECT * FROM tbl_detail_pendidikan JOIN tbl_riwayat_pendidikan ON tbl_detail_pendidikan.IDPendidikan = tbl_riwayat_pendidikan.IDPendidikan WHERE NIK = '$NIK' ");
?>
<html>
    <head>
        <title>View</title>
    </head>
    <body>
        <h2>
            Detail CV <i><?= $result["nama"] ?></i>
        </h2>
        <hr>
        <table border="0" cellpadding="4">
            <tr>
                <td size="90">NIK</td>
                <td>: <?= $result["NIK"] ?> </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?= $result["nama"] ?> </td>
            </tr>
            <tr>
                <td>TTL</td>
                <td>: <?= $result["TempatLahir"] ?>, <?= $result["TanggalLahir"] ?> </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= $result["Alamat"] ?> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <?= $result["Email"] ?></td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>: <?= $result["NoHp"] ?> </td>
            </tr>
            <tr height="40">
                <td></td>
                <td>
                    <a href="./data.php">Kembali</a>
                </td>
            </tr>
        </table>
        <h2>Riwayat Pendidikan <?= $result["nama"] ?> </h2>
        <table>
            <th bgcolor="#66CDAA">No</th>
            <th bgcolor="#66CDAA">Pendidikan</th>
            <th bgcolor="#66CDAA">Riwayat Pendidikan</th>
            <?php $z = 1; ?>
            <?php
                while($data = $query_pendidikan->fetch_array()) {
            ?>
                <tr>
                    <td><?= $z; ?></td>
                    <td><?= $data["Pendidikan"] ?></td>
                    <td><?= $data["Keterangan"] ?></td>
                </tr>
            <?php $z++; ?>
            <?php
                }
            ?>
        </table>
    </body>
</html>