<?php
// Include file koneksi database
include 'function.php';

// Ambil data id_pinjam dari form
$id_pinjam = $_POST['id_pinjam'];

// Validasi data id_pinjam
if (!empty($id_pinjam)) {
    // Set status menjadi 'ditolak' (2)
    $status = '0'; // '2' untuk status ditolak

    // Query untuk update status peminjaman
    $query = "UPDATE data_pinjam SET status='$status' WHERE id_pinjam='$id_pinjam'";
    
    // Eksekusi query dan periksa hasilnya
    if (mysqli_query($conn, $query)) {
        // Setelah update berhasil, lakukan penghapusan data
        $delete_query = "DELETE FROM data_pinjam WHERE id_pinjam='$id_pinjam'";
        if (mysqli_query($conn, $delete_query)) {
            // Redirect dengan pesan sukses
            header("Location: permintaan_pinjam_admin.php?message=reject_success");
        } else {
            // Redirect dengan pesan error penghapusan
            header("Location: permintaan_pinjam_admin.php?message=delete_error");
        }
    } else {
        // Redirect dengan pesan error update status
        header("Location: permintaan_pinjam_admin.php?message=reject_error");
    }
} else {
    // Redirect dengan pesan error jika id_pinjam kosong
    header("Location: permintaan_pinjam_admin.php?message=invalid_id");
}

// Tutup koneksi database
mysqli_close($conn);
?>