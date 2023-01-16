<?php
    require 'config/koneksi.php';
    $query = $conn->query("SELECT * FROM tbl_identitas LIMIT 1");
    $data = mysqli_fetch_array($query);
    
    $nik = $data["NIK"];

    $query_riwayat_pekerjaan = $conn->query("SELECT * FROM tbl_detail_riwayat JOIN tbl_riwayat_pekerjaan ON tbl_detail_riwayat.IDRiwayatPekerjaan = tbl_riwayat_pekerjaan.IDRiwayatPekerjaan  WHERE NIK = '$nik' ");

    $query_riwayat_keahlian = $conn->query("SELECT * FROM tbl_detail_keahlian JOIN tbl_keahlian ON tbl_detail_keahlian.IDKeahlian = tbl_keahlian.IDKeahlian WHERE NIK = '$nik' ");

    $query_hobi = $conn->query("SELECT * FROM tbl_detail_hobi JOIN tbl_hobi ON tbl_detail_hobi.IDHobi = tbl_hobi.IDHobi WHERE NIK = '$nik' ");

    $query_project = $conn->query("SELECT * FROM tbl_detail_project WHERE NIK = '$nik' ");

    $query_galeri = $conn->query("SELECT * FROM tbl_detail_galeri WHERE NIK = '$nik' ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Melvi Seliza Melati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center mt-4">CV Melvi seliza melati
    </h1>
    <hr>
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img src="1.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Identitas Diri</h1>
            <p class="mb-1">Nama : <?= $data["nama"] ?> </p>
            <p class="mb-1">Nik : <?= $data["NIK"] ?> </p>
            <p class="mb-1">TTL : <?= $data["TempatLahir"] ?>, <?= $data["TanggalLahir"] ?> </p>
            <p class="mb-1">Alamat : <?= $data["Alamat"] ?> </p>
            <p class="mb-1">Email : <?= $data["Email"] ?> </p>
            <p class="mb-1">No HP : <?= $data["NoHp"] ?> </p>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <h5>Riwayat Pekerjaan</h5>
            <?php foreach ($query_riwayat_pekerjaan as $riwayat_pekerjaan) : ?>
            <li>
                <?= $riwayat_pekerjaan["Keterangan"] ?>
            </li>
            <?php endforeach ?>
          </div>
          <div class="col-6">
            <h5>Riwayat Keahlian</h5>
            <?php foreach ($query_riwayat_keahlian as $riwayat_keahlian) : ?>
                <li>
                    <?= $riwayat_keahlian["Keahlian"] ?>
                </li>
            <?php endforeach ?>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-6">
            <h5>Hobi</h5>
            <?php foreach ($query_hobi as $hobi) : ?>
            <li>
                <?= $hobi["Hobi"] ?>
            </li>
            <?php endforeach ?>
          </div>
          <div class="col-6">
            <h5>Project</h5>
            <?php foreach ($query_project as $project) : ?>
                <li>
                    <?= $project["nama_project"]; ?>
                </li>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <div class="container">
        <h3 class="text-center text-primary mt-2">Galeri</h3>
      <hr>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($query_galeri as $galeri) : ?>
            <div class="col">
                <img src="<?= $galeri["galeri"] ?>" class="img-fluid" width="300" height="600" alt="...">
            </div>
        <?php endforeach ?>
      </div>
      <div class="container mt-4">
        <h4 class="text-primary text-center">Artikel</h4>
        <hr>
      </div>
      <div class="container col-xxl-8 px-4 py-2 mb-5">
        <div class="row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Teknik Informatika</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur quo ipsum non molestiae laboriosam! Expedita molestias consectetur asperiores, autem dolores eveniet assumenda aliquid facilis qui provident eaaa</p>
                <a href="detail_artikel.html" class="btn btn-primary">Selengkapnya</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Teknik Mesin</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam similique impedit iusto, sit at maiores repudiandae iste delectus ipsa, sint officiis voluptas amet illum molestiae optio nam voluptate dolores cumque.</p>
                <a href="detail_artikel.html" class="btn btn-primary">Selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>