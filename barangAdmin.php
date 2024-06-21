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
                <div class="sidebar-brand-text mx-3">MAIN MENU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

                      <!-- Nav Item - Dashboard -->
                      <li class="nav-item active">
                <a class="nav-link" href="index_admin.php">
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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Alerts Center</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">Message Center</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
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

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>

                   <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
        <div class="btn-container">
            <button class="btn btn-danger" name="btn_tambah_barang" id="btn_tambah_barang" data-toggle="modal" data-target="#ModalBarang">Tambah Data Barang</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Stock</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM barang";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id_barang"] . "</td>";
                        echo "<td>" . $row["nama_barang"] . "</td>";
                        echo "<td>" . $row["desc_barang"] . "</td>";
                        echo "<td>" . $row["stock_barang"] . "</td>";
                        echo "<td>
                                <button class='btn btn-primary edit-btn' data-toggle='modal' data-target='#editModal" . $row['id_barang'] . "'>
                                    <i class='bi bi-pencil-square'></i> Edit
                                </button>
                              </td>";
                        echo "<td>
                                <form method='POST' action='function.php'>
                                    <input type='hidden' name='id_hapus' value='" . $row['id_barang'] . "'>
                                    <button type='submit' class='btn btn-danger' name='btn_hapus'>
                                        <i class='bi bi-trash'></i> Hapus
                                    </button>
                                </form>
                              </td>";
                        echo "</tr>";

                        // Modal Edit
                        echo "<div class='modal fade' id='editModal" . $row['id_barang'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row['id_barang'] . "' aria-hidden='true'>";
                        echo "<div class='modal-dialog' role='document'>";
                        echo "<div class='modal-content'>";
                        echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='editModalLabel" . $row['id_barang'] . "'>Edit Data Barang</h5>";
                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                        echo "<form method='POST' action='function.php'>"; // Form action to your PHP processing file
                        echo "<div class='modal-body'>";
                        echo "<input type='hidden' name='id_edit' value='" . $row['id_barang'] . "'>";
                        echo "<div class='form-group'>";
                        echo "<label for='nama'>Nama Barang</label>";
                        echo "<input type='text' class='form-control' name='nama' id='nama' value='" . $row['nama_barang'] . "' required>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='deskripsi'>Deskripsi Barang</label>";
                        echo "<textarea class='form-control' name='deskripsi' id='deskripsi' required>" . $row['desc_barang'] . "</textarea>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<label for='stock'>Stock</label>";
                        echo "<input type='number' class='form-control' name='stock' id='stock' value='" . $row['stock_barang'] . "' required>";
                        echo "</div>";
                        echo "<div class='form-group'>";
                        echo "<div class='modal-footer'>";
                        echo "<button type='submit' name='btn_edit' class='btn btn-primary'>Save changes</button>";
                        echo "<button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>";
                        echo "</div>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        // End Modal Edit
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

     
                        
    <!-- The Modal -->
        <div class="modal" id="ModalBarang">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Barang</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div class="mb-3 mt-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" required>
                                </div>
                                <button  class="btn btn-primary" name="btn_submit">Submit</button>
                                <button  class="btn btn-danger" name="btn_batal">batal</button>
                            </form>    
                        </div>

                        </div>
            </div>
        </div>
</body>

</html>