<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $spesialisasi = trim(mysqli_real_escape_string($con, $_POST['spesialisasi']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialisasi, no_telp, email) VALUES ('$uuid', '$nama', '$spesialisasi', '$telp', '$email')") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $spesialisasi = trim(mysqli_real_escape_string($con, $_POST['spesialisasi']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    mysqli_query($con, "UPDATE tb_dokter SET nama_dokter = '$nama', spesialisasi = '$spesialisasi', no_telp = '$telp', email = '$email' WHERE id_dokter = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
}
?>