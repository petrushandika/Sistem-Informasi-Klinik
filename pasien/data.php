<?php include_once('../header.php'); ?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
            <small>Data Pasien</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus" style="word-spacing: -8px; font-weight: bold;"> Tambah Pasien</i></a>
                <a href="import.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-import" style="word-spacing: -8px; font-weight: bold;"> Import Pasien</i></a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pasien">
                <thead>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
        $(document).ready(function() {
            $('#pasien').DataTable({
                ajax: 'dataPasien.php',
                processing: true,
                serverSide: true,
                // scrollY: '250px',
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdf',
                        orientation: 'portrait',
                        pageSize: 'Legal',
                        title: 'Data Pasien',
                        download: 'open',
                    },
                    'csv', 'excel', 'print', 'copy'
                ],
                columnDefs: [
                    {
                        "targets": 6, // Sesuaikan dengan nomor kolom yang ingin Anda konfigurasi
                        "searchable": false,
                        "orderable": false,
                        "render": function (data, type, row) {
                            var btn = "<center>" +
                                "<a href=\"edit.php?id=" + data + "\" class=\"btn btn-warning btn-xs\" style=\"margin-right: 5px;\"><i class=\"glyphicon glyphicon-edit\"></i></a>" +
                                "<a href=\"del.php?id=" + data + "\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a>" +
                                "</center>";
                            return btn;
                        }
                    }
                ]
            });
        });
        </script>

    </div>

<?php include_once('../footer.php'); ?>