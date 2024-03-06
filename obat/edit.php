<?php
include_once('../header.php');

?>
    <div class="box">
        <h1>Obat</h1>
        <h4>
            <small>Edit Data Obat</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left" style="word-spacing: -8px; font-weight: bold;"> Kembali</i></a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'");
                $data = mysqli_fetch_array($sql_obat);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Obat</label>
                        <input type="hidden" name="id" value="<?=$data['id_obat']?>">
                        <input type="text" name="nama" id="nama" value="<?=$data['nama_obat']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Obat</label>
                        <input type="text" name="jenis" id="jenis"  value="<?=$data['jenis_obat']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stock</label>
                        <input type="text" name="stok" id="stok" value="<?=$data['stok']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" value="<?=$data['harga']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include_once('../footer.php'); ?>