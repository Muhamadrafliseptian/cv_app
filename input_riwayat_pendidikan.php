<?php
    $conn = mysqli_connect("localhost", "root", "", "curriculumvitae");

    $nik = $_GET["NIK"];
    $get_data = $conn->query("SELECT * FROM tbl_identitas WHERE NIK = '$nik' ");
    $data_identitas = mysqli_fetch_array($get_data);

    if (isset($_POST["submit"])) {
        $NIK = $_POST["NIK"];
        $IDRiwayatPekerjaan = $_POST["IDRiwayatPekerjaan"];

        $query = "INSERT INTO tbl_detail_riwayat VALUES ('$NIK', '$IDRiwayatPekerjaan')";
        
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "Berhasil";

            header("location:MasterPendidikan.php");
        } else {
            echo "Gagal";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }

    $query_riwayat_pekerjaan = $conn->query("SELECT * FROM tbl_riwayat_pekerjaan");
?>
<html>
    <h1>Input Data</h1>
    <form action="" method="POST">
        <input type="hidden" name="NIK" value="<?= $data_identitas["NIK"] ?>">
        <ul type="none">
            <li>
                Nama Identitas
            </li>
            <li>
                <input type="text" name="nama" value="<?= $data_identitas["nama"] ?>" readonly>
            </li><br>

            <li>Riwayat Pekerjaan</li>
            <li>
                <select name="IDRiwayatPekerjaan">
                    <option value="">- Pilih -</option>
                    <?php foreach ($query_riwayat_pekerjaan as $riwayat_pekerjaan) : ?>
                    <option value="<?= $riwayat_pekerjaan["IDRiwayatPekerjaan"] ?>">
                        <?= $riwayat_pekerjaan["Keterangan"] ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </li><br>

            <li>
                <button type="submit" name="submit">
                    Simpan
                </button>
            </li>
        </ul>
    </form>
</html>