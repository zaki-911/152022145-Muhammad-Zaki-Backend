<?php
$servername = "localhost"; // Nama host server database
$username = "root"; // Nama pengguna database
$password = ""; // Password database
$dbname = "iot_cuaca"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
