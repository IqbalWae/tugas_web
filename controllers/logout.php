<?php
session_start();
// Menghapus semua session
session_destroy();

// Mengarahkan kembali ke halaman utama
header("location:../index.php");
?>