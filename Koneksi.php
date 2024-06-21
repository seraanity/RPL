<?php
// Periksa apakah sesi user_id ada, yang menandakan pengguna sudah login
if (!isset($_SESSION['username']) && isset($_SESSION['password'])) {
    // Jika sesi tidak ada, arahkan pengguna ke halaman login
    header('Location: index.php');
    exit();
}
?>