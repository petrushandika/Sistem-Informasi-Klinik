<?php
include_once('../header.php');

?>
    <div class="box">
        <h1>Dokter</h1>
        <h4>
            <small>Edit Data Dokter</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left" style="word-spacing: -8px; font-weight: bold;"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_dokter);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="hidden" name="id" value="<?=$data['id_dokter']?>">
                        <input type="text" name="nama" id="nama" value="<?=$data['nama_dokter']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <input type="text" name="spesialisasi" id="spesialisasi" value="<?=$data['spesialisasi']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" value="<?=$data['no_telp']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?=$data['email']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan"  class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once('../footer.php'); ?>