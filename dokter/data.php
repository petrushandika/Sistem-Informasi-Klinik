<?php include_once('../header.php'); ?>

    <div class="box">
        <h1>Dokter</h1>
        <h4>
            <small>Data Dokter</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" style="word-spacing: -8px; font-weight: bold;"> Tambah Dokter</i></a>
            </div>
        </h4>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dokter">
                <thead>
                    <tr>
                        <th>
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
                        <th style="text-align: center;">No.</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_dokter)) {
                        ?>
                        <tr>
                            <td align="center">
                                <input type="checkbox" name="checked[]" class="check" value=<?= isset($data['id_dokter']) ? $data['id_dokter'] : ''; ?>
                            </td>
                            <td style="text-align: center;"><?= $no++; ?>.</td>
                            <td><?= isset($data['nama_dokter']) ? $data['nama_dokter'] : ''; ?></td>
                            <td><?= isset($data['spesialisasi']) ? $data['spesialisasi'] : ''; ?></td>
                            <td><?= isset($data['no_telp']) ? $data['no_telp'] : ''; ?></td>
                            <td><?= isset($data['email']) ? $data['email'] : ''; ?></td>
                            <td align="center">
                                <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                        </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </form>
        
        <div class="box pull-right">
            <!-- <button class="btn btn-warning btn-sm" onclick="edit()"><i class="glyphicon glyphicon-edit"></i>Edit</button> -->
            <button style="margin-top:15px;" class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#dokter').DataTable({
                columnDefs: [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [0,6]
                    }
                ],
                "order": [1, "asc"]
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

        // function edit() {
        //     document.proses.action = 'edit.php';
        //     document.proses.submit();
        // }

        function hapus() {
            var conf = confirm('Yakin akan menghapus data?');
            if(conf) {
                document.proses.action = 'del.php';
                document.proses.submit();
            }
        }
        </script>
<?php include_once('../footer.php'); ?>