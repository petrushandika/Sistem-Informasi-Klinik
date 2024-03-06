<?php include_once('../header.php'); ?>

<div class="box">
        <h1>Jadwal Praktek</h1>
        <h4>
            <small>Tambah Jadwal</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-info btn-xs">Data</a>
                <a href="generate.php" class="btn btn-primary btn-xs">Tambah Data Lagi</a>
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
                        for($i=1; $i<=$_POST['count_add']; $i++) { ?>
                            <tr>
                                <td><?=$i?></td>
                                <td>
                                    <input type="text" name="nama_dokter-<?=$i?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="hari-<?=$i?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="jam_kerja-<?=$i?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="keterangan-<?=$i?>" class="form-control">
                                </td>
                            </tr>
                    <?php
                    }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

<?php include_once('../footer.php'); ?>