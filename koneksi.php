<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "pbw";

$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
