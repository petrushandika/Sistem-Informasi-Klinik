<?php include_once('../header.php'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1>Simple Sidebar</h1>
            <p>Selamat Datang <mark><?=$_SESSION['user'];?></mark> di website Klinik</p>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>

<?php include_once('../footer.php'); ?>