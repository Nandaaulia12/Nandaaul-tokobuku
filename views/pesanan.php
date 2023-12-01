<?php

include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
?>

<title>Formulir Pemesanan</title>

<div class="container-fluid">
<div class="card shadow mb-4">
<body>

<h2>Formulir Pemesanan Produk Bunga</h2>
<form method="post" action="<?php echo htmlspecialchars($_GET["id"]);?>">
<div class="row">
                   
                    <div class="col-lg-8">
                        <form action="../routers/r_bunga.php?aksi=tambah" method="POST" class="user" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama pembeli" name="nama_bunga">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="jenis_bunga">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Produk yang dipesan" name="harga">
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
    
</form>

</div>
</div>

<?php
include_once 'template/footer.php';
?> 