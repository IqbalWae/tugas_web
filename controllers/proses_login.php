<?php
session_start();
require_once '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Pastikan kamu punya tabel users dengan kolom 'role' (admin/user)
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_assoc($query);
    
    // Simpan data ke session
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $data['role'];
    $_SESSION['status'] = "login";

    if($data['role'] == "admin"){
        header("location:../index.php"); // Arahkan ke dashboard admin
    } else if($data['role'] == "user"){
        header("location:../index.php"); // Arahkan ke halaman utama user
    }
} else {
    header("location:../views/login.php?pesan=gagal");
}
?>