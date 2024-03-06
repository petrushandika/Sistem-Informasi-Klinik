<?php
include_once('../header.php');

?>
    <div class="box">
        <h1>Riwayat Pengobatan</h1>
        <h4>
            <small>Tambah Riwayat Pengobatan</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left" style="word-spacing: -8px; font-weight: bold;"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="pasien">Pasien</label>
                        <select name="pasien" id="pasien" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die(mysqli_error($con));
                            while ($data_pasien = mysqli_fetch_array($sql_pasien)) {
                                echo '<option value="' . $data_pasien['id_pasien'] . '">' . $data_pasien['nama_pasien'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control" required autofocus></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
                            while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                echo '<option value="' . $data_dokter['id_dokter'] . '">' . $data_dokter['nama_dokter'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control" required autofocus></textarea>
                    </div>
                    <div class="form-group">
                        <label for="obat">Obat</label>
                        <select multiple name="obat[]" id="obat" class="form-control" size="5" required>
                            <?php
                            $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die(mysqli_error($con));
                            while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                echo '<option value="' . $data_obat['id_obat'] . '">' . $data_obat['nama_obat'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Periksa</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="Reset" class="btn btn-default">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once('../footer.php'); ?>