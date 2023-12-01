<body id="page-top">

    <div id="wrapper">
 
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $_SESSION['data']['nama_kasir'] ?> <sup><?= $_SESSION['data']['role'] ?></sup></div>
            </a>

            <?php

            if ($_SESSION['data']['role'] == 'admin') { ?>

                <hr class="sidebar-divider my-0">

                <li class="nav-item <?= $halaman == 'Home' ? 'active' : ''; ?>">
                    <a class="nav-link" href="../views/home.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <hr class="sidebar-divider">

                <li class="nav-item <?= $halaman == 'bunga' ? 'active' : ''; ?>">
                    <a class="nav-link" href="../views/bunga.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Produk Bunga</span></a>
                </li>

                <hr class="sidebar-divider">

                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            <?php } elseif ($_SESSION['data']['role'] == 'kasir') { ?> 

                <hr class="sidebar-divider my-0">

                <li class="nav-item <?= $halaman == 'Home User' ? 'active' : ''; ?>">
                    <a class="nav-link" href="../views/home_kasir.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Tables -->
                <li class="nav-item <?= $halaman == 'Barang User' ? 'active' : ''; ?>">
                    <a class="nav-link" href="../views/barang_user.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Produk Bunga</span></a>
                </li>

<hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                

            <?php } ?>

        </ul>
        <!-- End of Sidebar -->