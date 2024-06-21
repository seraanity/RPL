<?php
session_start();
include 'Koneksi.php';
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pinjam = $_POST['id_pinjam'];
    $tgl_kembali = date('Y-m-d');

    // Update status dan tanggal kembali
    $query = "UPDATE data_pinjam SET status = '2', tgl_kembali = ? WHERE id_pinjam = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $tgl_kembali, $id_pinjam);

    if (mysqli_stmt_execute($stmt)) {
        // Pengembalian berhasil
        $_SESSION['message'] = "Barang berhasil dikembalikan!";
    } else {
        // Pengembalian gagal
        $_SESSION['message'] = "Pengembalian barang gagal!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Redirect kembali ke halaman data_peminjaman.php
    header("Location: data_peminjaman.php");
    exit;
}
?>
