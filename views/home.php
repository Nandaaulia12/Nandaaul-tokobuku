<?php
$halaman = "Home";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
?>

                <div class="container-fluid">

                 <!-- Page Heading -->
                 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h2>
                     Selamat Datang <?= $_SESSION['data']['nama_kasir'] ?>, dan rolenya sebagai <?= $_SESSION['data']['role'] ?>
                </h2>

</div>
                        
                   

                    <!-- Content Row -->

            

<?php
include_once 'template/footer.php';
?>


 