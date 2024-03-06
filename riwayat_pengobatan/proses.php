<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();

    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $tanggal = trim(mysqli_real_escape_string($con, $_POST['tanggal']));
    mysqli_query($con, "INSERT INTO tb_riwayat_pengobatan (id_riwayat, id_pasien, keluhan, id_dokter, diagnosa, tanggal_periksa) VALUES ('$uuid', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$tanggal')") or die(mysqli_error($con));

    $obat = $_POST['obat'];
    foreach ($obat as $ob) {
        mysqli_query($con, "INSERT INTO tb_rp_obat (id_riwayat, id_obat) VALUES ('$uuid', '$ob')") or die (mysqli_error($con));
    }
    echo "<script>window.location='data.php'</script>";
}
?>