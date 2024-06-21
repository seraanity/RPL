<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apk_sarpras";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function checkLoginAdmin($username, $password) {
    global $conn;

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    return $result->num_rows > 0;
}

function checkLoginSiswa($username, $password) {
    global $conn;

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM siswa WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    return $result->num_rows > 0;
}
?>
