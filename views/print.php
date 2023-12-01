<?php
include_once '../controllers/c_bunga.php';
$bunga = new c_bunga();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Daftar Produk</title>
</head>

<body>
    <center>
        <h2>DATA DAFTAR PRODUK BUNGA</h2>
    </center>

    <table style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bunga</th>
                <th>Jenis Bunga</th>
                <th>Harga</th>
                <th>Gambar</th>
            </tr>
        </thead>

        <center>
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
        </center>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>