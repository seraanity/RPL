<?php 
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PEMINJAMAN SARANA DAN PRASARANA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DASHBOARD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="DashboardUser.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span>
                </a>
            </li>

            <!-- Nav Item - Data Barang -->
            <li class="nav-item active">
                <a class="nav-link" href="barang.php">
                    <i class="bi bi-archive-fill"></i>
                    <span>DATA BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Data Ruang -->
            <li class="nav-item active">
                <a class="nav-link" href="ruang.php">
                    <i class="bi bi-door-closed-fill"></i>
                    <span>DATA RUANG</span>
                </a>
            </li>

            <!-- Nav Item - Data Peminjaman -->
            <li class="nav-item active">
                <a class="nav-link" href="data_peminjaman.php">
                    <i class="bi bi-save2-fill"></i>
                    <span>DATA PEMINJAMAN BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Data Peminjaman -->
            <li class="nav-item active">
                <a class="nav-link" href="data_peminjaman_ruang.php">
                    <i class="bi bi-save2-fill"></i>
                    <span>DATA PEMINJAMAN RUANG</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Peminjaman -->
            <li class="nav-item active">
                <a class="nav-link" href="riwayat_peminjaman.php">
                    <i class="bi bi-clock-history"></i>
                    <span>RIWAYAT PEMINJAMAN BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Peminjaman -->
            <li class="nav-item active">
                <a class="nav-link" href="riwayat_peminjaman_ruang.php">
                    <i class="bi bi-clock-history"></i>
                    <span>RIWAYAT PEMINJAMAN RUANG</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="LoginSiswa.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- DATA BARANG -->
                       <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                       <div class="card-body">
                       <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                       <div class="h5 mb-0 font-weight-bold text-gray-800">BARANG</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="barang.php" class="text-decoration-none">
                            <?php
                                $sql = "SELECT * FROM barang";
                                
                                $query = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($query);
                                ?>
                    <u><?php echo $count . ' barang'; ?></u></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="bi bi-archive-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATA RUANG -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                       <div class="card-body">
                       <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">RUANG</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="ruang.php" class="text-decoration-none">
                            <?php
                                $sql = "SELECT * FROM ruang";
                                
                                $query = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($query);
                                ?>
                    <u><?php echo $count . ' ruang'; ?></u></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="bi bi-door-closed-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATA PEMINJAMAN -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                       <div class="card-body">
                       <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">DATA PEMINJAMAN</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="artikel.php" class="text-decoration-none">
                            <?php
                                $sql = "SELECT * FROM data_pinjam";
                                
                                $query = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($query);
                                ?>
                    <u><?php echo $count . ' PEMINJAMAN'; ?></u></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="bi bi-person-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIWAYAT PEMINJAMAN -->
                    <div class="col-xl-3 col-md-6 mb-4">
                       <div class="card border-left-primary shadow h-100 py-2">
                       <div class="card-body">
                       <div class="row no-gutters align-items-center">
                       <div class="col mr-2">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">RIWAYAT PEMINJAMAN</div>
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="artikel.php" class="text-decoration-none">
                            <?php
                                $sql = "SELECT * FROM data_pinjam";
                                
                                $query = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($query);
                                ?>
                    <u><?php echo $count . ' barang / ruang telah dipinjam'; ?></u></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="bi bi-save2-fill"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               
            <!-- End of Main Content -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
