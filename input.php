<?php
    $conn = mysqli_connect("localhost", "root", "", "curriculumvitae");

    if (isset($_POST["submit"])) {
        $NIK = $_POST["NIK"];
        $nama = $_POST["nama"];
        $Foto = $_POST["Foto"];
        $TempatLahir = $_POST["TempatLahir"];
        $TanggalLahir = $_POST["TanggalLahir"];
        $Alamat = $_POST["Alamat"];
        $Email = $_POST["Email"];
        $NoHp = $_POST["NoHp"];
        $JenisKelamin = $_POST["JenisKelamin"];
        $MotoHidup = $_POST["MotoHidup"];

        $query = "INSERT INTO tbl_identitas VALUES ('$NIK', '$nama', '$Foto', '$TempatLahir', '$TanggalLahir', '$Alamat', '$Email', '$NoHp', '$JenisKelamin', '$MotoHidup')";
        
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "Berhasil";

            header("location:MasterIdentitas.php");
        } else {
            echo "Gagal";
            echo "<br>";
            echo mysqli_error($conn);
        }
    }
?>
<html>
    <h1>Input Data</h1>
    <form action="" method="POST">
        <ul type="none">
            <li>
                <label>NIK</label>
                <input type="text" name="NIK" required>
            </li><br>
            
            <li>
                <label>Nama</label>
                <input type="text" name="nama" required>
            </li><br>

            <li>
                <label>Foto</label>
                <input type="text" name="Foto" required>
            </li><br>

            <li>
                <label>Tempat Lahir</label>
                <input type="text" name="TempatLahir" required>
            </li><br>

            <li>
                <label>Tanggal Lahir</label>
                <input type="text" name="TanggalLahir" required>
            </li><br>

            <li>
                <label>Alamat</label>
                <input type="text" name="Alamat" required>
            </li><br>

            <li>
                <label>Email</label>
                <input type="text" name="Email" required>
            </li><br>

            <li>
                <label>Jenis Kelamin</label>
                <select name="JenisKelamin" id="JenisKelamin">
                    <option value="">- Pilih -</option>
                    <option value="L">Laki - Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </li><br>

            <li>
                <label>Moto Hidup</label>
                <input type="text" name="MotoHidup" required>
            </li>

            <li>
                <label>NoHP</label>
                <input type="text" name="NoHp" required>
            </li><br>

            <li>
                <button type="submit" name="submit">Simpan Data</button>
            </li>
        </ul>
    </form>
</html>