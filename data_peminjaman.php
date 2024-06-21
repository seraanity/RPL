<?php
include 'Koneksi.php';
include 'function.php';

// Menangani permintaan pinjam dari barang.php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_pinjam_barang'])) {
    session_start(); // Pastikan session dimulai jika belum
    $id_barang = intval($_POST['id_barang']);
    $id_siswa = $_SESSION['id_siswa']; // Asumsi bahwa id_siswa disimpan di session

    // Periksa apakah id_siswa ada di tabel siswa
    $sql_check_siswa = "SELECT id_siswa FROM siswa WHERE id_siswa = '$id_siswa'";
    $result = mysqli_query($conn, $sql_check_siswa);

    if (mysqli_num_rows($result) > 0) {
        $tgl_pinjam = date('Y-m-d');
        $tgl_kembali = date('Y-m-d');
        $jumlah = 0; // Default jumlah pinjam

        // Masukkan data pinjam ke tabel data_pinjam
        $sql_pinjam = "INSERT INTO data_pinjam (id_siswa, id_barang, jumlah, tgl_pinjam, tgl_kembali, status)
                       VALUES ('$id_siswa', '$id_barang', '$jumlah', '$tgl_pinjam', '$tgl_kembali', '0')";
        if (mysqli_query($conn, $sql_pinjam)) {
            echo "Peminjaman berhasil!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid student ID.";
    }
}


$sql = "SELECT dp.id_pinjam, s.nama_siswa, b.nama_barang, dp.jumlah, dp.tgl_pinjam, dp.tgl_kembali, dp.status 
                                                  FROM data_pinjam dp 
                                                  JOIN barang b ON dp.id_barang = b.id_barang
                                                  JOIN siswa s ON dp.id_siswa = s.id_siswa";
$result = mysqli_query($conn, $sql);
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

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="LoginSiswa.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
                    <p class="mb-4">Berikut adalah data peminjaman barang yang sedang berlangsung:</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Peminjaman</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pinjam</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT dp.id_pinjam, s.nama_siswa, b.nama_barang, dp.jumlah, dp.tgl_pinjam, dp.tgl_kembali, dp.status 
                                                  FROM data_pinjam dp 
                                                  JOIN barang b ON dp.id_barang = b.id_barang
                                                  JOIN siswa s ON dp.id_siswa = s.id_siswa
                                                  ORDER BY id_pinjam ASC";
                                        $result = mysqli_query($conn, $query);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $status_text = "";
                                                if ($row['status'] == '0') {
                                                    $status_text = "Menunggu Peminjaman ...";
                                                } elseif ($row['status'] == '1') {
                                                    $status_text = "Sedang Dipinjam";
                                                } elseif ($row['status'] == '2') {
                                                    $status_text = "Menunggu Pengembalian ...";
                                                }

                                                echo "<tr>";
                                                echo "<td>" . $row['id_pinjam'] . "</td>";
                                                echo "<td>" . $row['nama_barang'] . "</td>";
                                                echo "<td>" . $row['jumlah'] . "</td>";
                                                echo "<td>" . $row['tgl_pinjam'] . "</td>";
                                                echo "<td>" . $row['tgl_kembali'] . "</td>";
                                                echo "<td>" . $status_text . "</td>";
                                                echo "<td>";
                                                if ($row['status'] == '1') {
                                                    echo "<form action='kembalikan_barang.php' method='POST'>";
                                                    echo "<input type='hidden' name='id_pinjam' value='" . $row['id_pinjam'] . "'>";
                                                    echo "<button type='submit' class='btn btn-danger'>Kembalikan</button>";
                                                    echo "</form>";
                                                } else {
                                                    echo "N/A";
                                                }
                                                echo "</td>";
                                                echo "</tr>";
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
