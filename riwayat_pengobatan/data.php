<?php include_once('../header.php'); ?>

    <div class="box">
        <h1>Riwayat Pengobatan</h1>
        <h4>
            <small>Data Riwayat Pengobatan</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" style="word-spacing: -8px; font-weight: bold;"> Tambah Riwayat Pengobatan</i></a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dokter">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th>Tanggal Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Nama Dokter</th>
                        <th>Diagnosa</th>
                        <th>Obat</th>
                        <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM tb_riwayat_pengobatan";
                $sql_rp = mysqli_query($con, $query) or die (mysqli_error($con));
                while ($data = mysqli_fetch_array($sql_rp))
                ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?>.</td>
                            <td><?= isset($data['tanggal_periksa']) ? $data['tanggal_periksa'] : ''; ?></td>
                            <td><?= isset($data['nama_pasien']) ? $data['nama_pasien'] : ''; ?></td>
                            <td><?= isset($data['keluhan']) ? $data['keluhan'] : ''; ?></td>
                            <td><?= isset($data['id_dokter']) ? $data['id_dokter'] : ''; ?></td>
                            <td><?= isset($data['diagnosa']) ? $data['diagnosa'] : ''; ?></td>
                            <td><?= isset($data['obat']) ? $data['obat'] : ''; ?></td>
                            <td align="center">
                                <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                        </tr>
                <?php
                ?>
                </tbody>
            </table>
        </div>
    </form>
    </div>

<?php include_once('../footer.php'); ?>