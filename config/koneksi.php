<?php
$host = "localhost";
$user = "root";     // Username default MySQL di XAMPP
$pass = "";         // Password default MySQL di XAMPP (biasanya kosong)
$db   = "perpustakaan"; // Nama database yang dibuat di awal

// Mengaktifkan koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>