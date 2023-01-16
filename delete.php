<?php

    $conn = mysqli_connect("localhost", "root", "", "curriculumvitae");

    $NIK = $_GET["NIK"];

    mysqli_query($conn, "DELETE FROM tbl_identitas WHERE NIK = '$NIK' ");

    header("location:MasterIdentitas.php");

?>