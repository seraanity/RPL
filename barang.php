<?php
session_start();
include 'Koneksi.php';
include 'function.php';

// Pastikan pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: LoginSiswa.php");
    exit();
}

$id = isset($_SESSION['id_barang']) ? $_SESSION['id_barang'] : [];
$pinjam_success = false;
$id_pinjam = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_simpan_pinjam'])) {
    $id_user = $_SESSION['username'];
    $status = 0;
    foreach ($id as $id_barang => $jumlah) {
        $sql = "SELECT stok FROM barang WHERE id_barang = $id_barang";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['stok'] < $jumlah) {
                echo "Stok tidak cukup untuk barang: " . htmlspecialchars($id_barang);
                exit();
            }
        }
    }

    $stmt = $conn->prepare("INSERT INTO data_pinjam (id_pinjam, id_siswa, id_barang, jumlah, tgl_pinjam, tgl_kembali, status) VALUES ($id_pinjam, ?,$id_barang, ?, NOW(), null, ? )");
    $stmt->bind_param("iii", $id_siswa, $jumlah, $status);

    if ($stmt->execute()) {
        $id_pinjam = $stmt->insert_id;

        foreach ($id as $id_barang => $jumlah) {
            $stmt_detail = $conn->prepare("INSERT INTO data_pinjam (id_pinjam, id_barang, jumlah) VALUES (?, ?, ?)");
            $stmt_detail->bind_param("iii", $id_pinjam, $id_barang, $jumlah);
            $stmt_detail->execute();

            // Kurangi stok barang
            $stmt_update = $conn->prepare("UPDATE barang SET stok_barang = stok_barang - ? WHERE id_barang = ?");
            $stmt_update->bind_param("ii", $jumlah, $id_barang);
            $stmt_update->execute();
        }
        unset($_SESSION['id_barang']);
        $pinjam_success = true;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
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
                    <span>RIWAYAT PEMINJAMAN</span>
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
                                <a class="dropdown-item" href="LoginSiswa.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- DATA BARANG -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT 
                                                    b.id_barang, 
                                                    GROUP_CONCAT(DISTINCT dp.id_siswa ORDER BY dp.id_siswa SEPARATOR ', ') AS id_siswa, 
                                                    b.nama_barang, 
                                                    b.desc_barang, 
                                                    b.stock_barang, 
                                                    b.status_barang 
                                                FROM barang b
                                                LEFT JOIN data_pinjam dp ON b.id_barang = dp.id_barang
                                                GROUP BY 
                                                    b.id_barang, 
                                                    b.nama_barang, 
                                                    b.desc_barang, 
                                                    b.stock_barang, 
                                                    b.status_barang
                                                ORDER BY b.id_barang ASC";
                                        $result = mysqli_query($conn, $sql);
                                        $nomor_urut = 0;
                                        if (mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $nomor_urut++;

                                                $data_id_barang = $row['id_barang'];
                                                $data_nama = $row['nama_barang'];
                                                $data_desc_barang = $row['desc_barang'];
                                                $data_stok = $row['stock_barang'];
                                                $data_status = $row['status_barang'];
                                                $data_id_siswa = $row['id_siswa'];
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $nomor_urut; ?></td>
                                            <td><?php echo $data_nama; ?></td>
                                            <td><?php echo $data_desc_barang; ?></td>
                                            <td><?php echo $data_stok; ?></td>
                                            <td><?php echo $data_status;  ?></td>
                                            <td>
                                            <button class="btn btn-success" name= "btn_pinjam" data-toggle="modal" data-target="#ModalPinjamBarang<?php echo $data_id_barang; ?>">Pinjam</button>
                                            </td>
                                        </tr>

                                                         
                                        <!-- Modal Pinjam Barang -->
                                            <div class="modal" id="ModalPinjamBarang<?php echo $data_id_barang; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Data Pinjam Barang</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                        <!-- Modal body -->
                                                            <div class="modal-body">
                                                            <form method="POST" action="data_peminjaman.php">
                                                                    <input type="hidden" name="id_siswa" value="<?php echo $data_id_siswa; ?>">
                                                                    <input type="hidden" name="id_barang" value="<?php echo $data_id_barang; ?>">
                                                                    <input type="hidden" name="tgl_kembali" value="0">
                                                                    <input type="hidden" name="status_barang" value="0">
                                                                <div class="form-group">
                                                                    <label class="col-md-4 col-xs-12 control-label">ID</label>
                                                                    <div class="col-md-2 col-xs-12">
                                                                        <input type="text" class="form-control" value="<?php echo $data_id_barang; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 col-xs-12 control-label">Nama</label>
                                                                    <div class="col-md-3 col-xs-12">
                                                                        <input type="text" name="nama" class="form-control" value="<?php echo $data_nama; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 col-xs-12 control-label">Deskripsi</label>
                                                                    <div class="col-md-4 col-xs-11">
                                                                        <input type="text" name="deskripsi" class="form-control" value="<?php echo $data_desc_barang; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 col-xs-12 control-label">Stock</label>
                                                                    <div class="col-md-3 col-xs-12">
                                                                        <input type="number" name="stock" class="form-control" value="<?php echo $data_stok; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 col-xs-12 control-label">Waktu Pinjam</label>
                                                                    <div class="col-md-4 col-xs-12">
                                                                        <input type="datetime" name="tgl_pinjam" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-4 col-xs-12 control-label">Jumlah Pinjam</label>
                                                                    <div class="col-md-4 col-xs-12">
                                                                    <input type="number" name="jumlah" value="1" min="1" max="<?php echo $data_stok; ?>" required>
                                                                    </div>
                                                                </div>

                                                                <div class="panel-footer text-right">
                                                                    <button class="btn btn-primary" name="btn_pinjam_barang">Simpan</button>
                                                                    <button  class="btn btn-danger" data-dismiss="modal">batal</button>
                                                                </div>
                                                            </form>  
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php  
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No data found</td></tr>";
                                            }

                                            mysqli_close($conn);
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
