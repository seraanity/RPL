<?php
// Include file koneksi database
include 'function.php';

// Ambil data id dari form
$id_pinjam = $_POST['id'];

// Validasi data id
if (!empty($id_pinjam)) {
    // Set status menjadi 'disetujui' (1)
    $status = '1'; // '1' untuk status disetujui

    // Query untuk update status peminjaman
    $query = "UPDATE data_pinjam SET status='$status' WHERE id_pinjam='$id_pinjam'";
    
    // Eksekusi query dan periksa hasilnya
    if (mysqli_query($conn, $query)) {
        // Redirect dengan pesan sukses
        header("Location: permintaan_pinjam_admin.php?message=success");
    } else {
        // Redirect dengan pesan error
        header("Location: permintaan_pinjam_admin.php?message=error");
    }
} else {
    // Redirect dengan pesan error jika id kosong
    header("Location: permintaan_pinjam_admin.php?message=invalid_id");
}

// Tutup koneksi database
mysqli_close($conn);
?>