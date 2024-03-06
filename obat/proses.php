<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenis = trim(mysqli_real_escape_string($con, $_POST['jenis']));
    $stok = trim(mysqli_real_escape_string($con, $_POST['stok']));
    $harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
    mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, jenis_obat, stok, harga) VALUES ('$uuid', '$nama', '$jenis', '$stok', '$harga')") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenis = trim(mysqli_real_escape_string($con, $_POST['jenis']));
    $stok = trim(mysqli_real_escape_string($con, $_POST['stok']));
    $harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
    mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', jenis_obat = '$jenis', stok = '$stok', harga = '$harga' WHERE id_obat = '$id'") or die(mysqli_error($con));  
    echo "<script>window.location='data.php'</script>";
}
?>