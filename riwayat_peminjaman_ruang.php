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
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-2">SARPRAS USER</div>
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
                <a class="nav-link" href="barangAdmin.php">
                    <i class="bi bi-archive-fill"></i>
                    <span>DATA BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Data Ruang -->
            <li class="nav-item active">
                <a class="nav-link" href="ruangAdmin.php">
                    <i class="bi bi-door-closed-fill"></i>
                    <span>DATA RUANG</span>
                </a>
            </li>

            <!-- Nav Item - DATA PEMINJAM -->
            <li class="nav-item active">
                <a class="nav-link" href="data_peminjam_admin.php">
                <i class="bi bi-person-fill"></i>
                    <span>DATA PEMINJAM</span>
                </a>
            </li>

            <!-- Nav Item - Permintaan Peminjaman Barang-->
            <li class="nav-item active">
                <a class="nav-link" href="permintaan_pinjam_admin.php">
                    <i class="bi bi-save-fill"></i>
                    <span>PERMINTAAN PEMINJAMAN BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Permintaan Peminjaman Ruang-->
            <li class="nav-item active">
                <a class="nav-link" href="permintaan_pinjam_ruang.php">
                    <i class="bi bi-save-fill"></i>
                    <span>PERMINTAAN PEMINJAMAN RUANG</span>
                </a>
            </li>

            <!-- Nav Item - Permintaan Pengembalian Barang-->
            <li class="nav-item active">
                <a class="nav-link" href="permintaan_pengembalian.php">
                    <i class="bi bi-layer-backward"></i>
                    <span>PERMINTAAN PENGEMBALIAN BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Permintaan Pengembalian Ruang-->
            <li class="nav-item active">
                <a class="nav-link" href="permintaan_pengembalian_ruang.php">
                    <i class="bi bi-layer-backward"></i>
                    <span>PERMINTAAN PENGEMBALIAN RUANG</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Peminjaman Barang-->
            <li class="nav-item active">
                <a class="nav-link" href="riwayat_peminjaman.php">
                    <i class="bi bi-clock-history"></i>
                    <span>RIWAYAT PEMINJAMAN BARANG</span>
                </a>
            </li>

            <!-- Nav Item - Riwayat Peminjaman Ruang-->
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
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- DATA PEMINJAMAN -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Riwayat Peminjaman Ruang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                          <th>ID Pinjam</th>
                          <th>Nama Peminjam</th>
                          <th>Nama Barang</th>
                          <th>Jumlah Pinjam</th>
                          <th>Tanggal Pinjam</th>
                          <th>Tanggal Kembali</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $sql = "SELECT
                                    data_pinjam_ruang.id_pinjam_ruang,
                                    siswa.nama_siswa,
                                    ruang.nama_ruang,
                                    data_pinjam_ruang.jumlah,
                                    data_pinjam_ruang.tgl_pinjam, 
                                    data_pinjam_ruang.tgl_kembali,
                                    data_pinjam_ruang.status
                                    
                                FROM 
                                    data_pinjam_ruang
                                JOIN 
                                    ruang ON data_pinjam_ruang.id_ruang = ruang.id_ruang
                                JOIN 
                                    siswa ON data_pinjam_ruang.id_siswa  = siswa.id_siswa";
                        $result = mysqli_query($conn, $sql);
                        $nomor_urut = 0;
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                $nomor_urut ++;
                                $data_id_pinjam = $row['id_pinjam_ruang'];
                                $data_nama_siswa = $row['nama_siswa'];
                                $data_nama_ruang = $row['nama_ruang'];
                                $data_jumlah = $row['jumlah'];
                                $data_tglpinjam = $row['tgl_pinjam'];
                                $data_tglkembali = $row['tgl_kembali'];
                                $data_status = $row['status'];
                        ?>
                        <tr>
                            <td><?php echo $data_id_pinjam; ?></td>
                            <td><?php echo $data_nama_siswa; ?></td>
                            <td><?php echo $data_nama_ruang; ?></td>
                            <td><?php echo $data_jumlah; ?></td>
                            <td><?php echo $data_tglpinjam; ?></td>
                            <td class="text-center">
                                <?php if($data_tglkembali == "0000-00-00") echo "N/A"; else echo $data_tglkembali;?>
                            </td>
                            <td>
                                <?php 
                                    if($data_status == '0') echo "<div class='text-danger'>Pinjam Ditolak</div>";
                                    else if($data_status == '1') echo "<div class='text-success'>Dikembalikan</div>"; ?>
                            </td>
                        </tr>
                        <?php
                            }
                        }else {
                            echo "0 result";
                        }
                        ?>
                      </tbody>
                    </table>
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
