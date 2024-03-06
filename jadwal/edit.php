<?php
$chk = $_POST['checked'];
if(!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php';</script>";
} else {
    include_once('../header.php'); ?>
<div class="box">
        <h1>Jadwal Praktek</h1>
        <h4>
            <small>Edit Tambah Jadwal</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="post">
                    <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Nama Dokter</th>
                            <th>Hari</th>
                            <th>Jam Kerja</th>
                            <th>Keterangan</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach($chk as $id) {
                            $sql_jadwal = mysqli_query($con, "SELECT * FROM tb_jadwal_praktek WHERE id_jadwal = '$id'") or die (mysqli_error($con));
                            while($data = mysqli_fetch_array($sql_jadwal)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td>
                                    <input type="hidden" name="id[]" value="<?=$data['id_jadwal']?>">
                                    <input type="text" name="nama_dokter[]" value="<?=$data['nama_dokter']?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="hari[]" value="<?=$data['hari']?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="jam_kerja[]" value="<?=$data['jam_kerja']?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="keterangan[]" value="<?=$data['keterangan']?>" class="form-control" required>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan Semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    <?php
    include_once('../footer.php');
} ?>