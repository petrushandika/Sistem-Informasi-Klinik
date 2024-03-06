<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $tanggal = trim(mysqli_real_escape_string($con, $_POST['tanggal']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nama_pasien, tanggal_lahir, jenis_kelamin, alamat, no_telp, email) VALUES ('$uuid', '$nama', '$tanggal', '$jk', '$alamat','$telp', '$email')") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $tanggal = trim(mysqli_real_escape_string($con, $_POST['tanggal']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    mysqli_query($con, "UPDATE tb_pasien SET nama_pasien = '$nama', tanggal_lahir = '$tanggal', jenis_kelamin = '$jk', alamat = '$alamat', no_telp = '$telp', email = '$email' WHERE id_pasien = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
} else if (isset($_POST['import'])) {
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../file/";
    $target_file = $target_dir . $file_name;
    move_uploaded_file($sumber, $target_file);
    
    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    $sql = "INSERT INTO tb_pasien (id_pasien, nama_pasien, tanggal_lahir, jenis_kelamin, alamat, no_telp, email) VALUES";
    for ($i=3; $i <= count($all_data); $i++) {
        $uuid = Uuid::uuid4()->toString();
        $nama = $all_data[$i]['A'];
        $tanggal = $all_data[$i]['B'];
        $jk = $all_data[$i]['C'];
        $alamat = $all_data[$i]['D'];
        $telp = $all_data[$i]['E'];
        $email = $all_data[$i]['F'];
        $sql .= " ('$uuid',  '$nama', '$tanggal', '$jk', '$alamat', '$telp', '$email'),";
    }
    $sql = substr($sql, 0, -1);
    echo $sql;
    unlink($target_file);
}
?>