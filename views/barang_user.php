<?php
$halaman = "Produk Bunga";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/c_bunga.php';

$bunga = new c_bunga();
?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $halaman ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $halaman ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>nama bunga</th>
                            <th>jenis bunga</th>
                            <th>harga</th>
                            <th>Gambar</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $nomor = 1;

                        foreach ($bunga->tampil() as $b) {
                        ?>
                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><?= $b->nama_bunga ?></td>
                                <td><?= $b->jenis_bunga ?></td>
                                <td><?= $b->harga ?></td>
                                <td>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <img src="<?= "../assets/img/" . $b->photo; ?>" alt="<?= $b->nama_bunga ?>" width="50" height="65">
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php
include_once 'template/footer.php';
?>