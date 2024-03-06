<?php include_once('../header.php'); ?>

    <div class="box">
        <h1>Jadwal Praktek</h1>
        <h4>
            <small>Jadwal</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" style="word-spacing: -8px; font-weight: bold;"> Tambah Jadwal</i></a>
            </div>
        </h4>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="jadwal">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th>Nama Dokter</th>
                        <th>Hari</th>
                        <th>Jam Kerja</th>
                        <th>Keterangan</th>
                        <th>
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_jadwal = mysqli_query($con, "SELECT * FROM tb_jadwal_praktek ORDER BY id_jadwal ASC") or die(mysqli_error($con));
                if (mysqli_num_rows($sql_jadwal) > 0) {
                    while ($data = mysqli_fetch_array($sql_jadwal)) {
                        ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?>.</td>
                            <td><?= isset($data['nama_dokter']) ? $data['nama_dokter'] : ''; ?></td>
                            <td><?= isset($data['hari']) ? $data['hari'] : ''; ?></td>
                            <td><?= isset($data['jam_kerja']) ? $data['jam_kerja'] : ''; ?></td>
                            <td><?= isset($data['keterangan']) ? $data['keterangan'] : ''; ?></td>
                            <td align="center">
                                <input type="checkbox" name="checked[]" class="check" value=<?= isset($data['id_jadwal']) ? $data['id_jadwal'] : ''; ?>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </form>
        
        <div style="margin-top:15px;" class="box pull-right">
            <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i>Edit</button>
            <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#jadwal').DataTable({
                columnDefs: [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [5]
                    }
                ],
                "order": [0, "asc"]
            });

            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.check').prop('checked', true);
                } else {
                    $('.check').prop('checked', false);
                }
            });

            $('.check').on('click', function() {
                if ($('.check:checked').length === $('.check').length) {
                    $('#select_all').prop('checked', true);
                } else {
                    $('#select_all').prop('checked', false);
                }
            });
        });

        function edit() {
            document.proses.action = 'edit.php';
            document.proses.submit();
        }

        function hapus() {
            var conf = confirm('Yakin akan menghapus data?');
            if(conf) {
                document.proses.action = 'del.php';
                document.proses.submit();
            }
        }
        </script>
<?php include_once('../footer.php'); ?>