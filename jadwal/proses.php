<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total; $i++) {
        $uuid = Uuid::uuid4()->toString();
        $nama_dokter = trim(mysqli_real_escape_string($con, $_POST['nama_dokter-' . $i]));
        $hari = trim(mysqli_real_escape_string($con, $_POST['hari-' . $i]));
        $jam_kerja = trim(mysqli_real_escape_string($con, $_POST['jam_kerja-' . $i]));
        $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan-' . $i]));

        $sql = mysqli_query($con, "INSERT INTO tb_jadwal_praktek (id_jadwal, nama_dokter, hari, jam_kerja, keterangan) VALUES ('$uuid', '$nama_dokter', '$hari', '$jam_kerja', '$keterangan')") or die(mysqli_error($con));
    }
    if ($sql) {
        echo "<script>alert('" . $total . " data berhasil ditambahkan'); window.location='data.php';</script>";
    } else {
        echo "<script>alert('Gagal tambah data, coba lagi'); window.location='generate.php';</script>";
    }    

    echo "<script></script>";
} else if (isset($_POST['edit'])) {
    for ($i = 0; $i<count($_POST['id']); $i++) {
        $id = $_POST['id'][$i];
        $nama_dokter = $_POST['nama_dokter'][$i];
        $hari = $_POST['hari'][$i];
        $jam_kerja = $_POST['jam_kerja'][$i];
        $keterangan = $_POST['keterangan'][$i];
        $sql = mysqli_query($con, "UPDATE tb_jadwal_praktek SET nama_dokter = '$nama_dokter', hari = '$hari', jam_kerja = '$jam_kerja', keterangan = '$keterangan' WHERE id_jadwal = '#id'") or die(mysqli_error($con));
    }
    echo "<script>alert('Data berhasil di update'); window.location='data.php';</script>";
}
?>
