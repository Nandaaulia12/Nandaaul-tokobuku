<?php
$halaman = "bunga";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';


include_once '../controllers/c_bunga.php';

$bunga = new c_bunga();
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <a href="tambah_bunga.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah produk bunga</a>

    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $halaman ?></h1>

    <!-- DataTales Example -->
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
                            <th>Nama Bunga</th>
                            <th>Jenis Bunga</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        if (empty($bunga->tampil())) { ?>
                            <tr>
                                <td colspan="6">
                                    <h1>
                                        <center> Tidak Ada Data </center>
                                    </h1>
                                </td>
                            </tr>
                            <?php
                        } else {
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
                                    <td>
                                        <center>
                                            <a href="edit_bunga.php?id=<?= $b->id_bunga ?>"><button type="button" class="btn btn-round btn-primary">Edit</button></a>
                                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../routers/r_bunga.php?id_bunga=<?= $b->id_bunga ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger"><i class="fa fa-trash"></i></button></a>
                                        </center>
                                    </td>
                                </tr>

                        <?php }
                        } ?>

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