<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password']; // Password biasa yang diketik user

// 1. Cek apakah username tersebut ada di database (tanpa mengecek password)
$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    // 2. Jika username ada, ambil datanya
    $data = mysqli_fetch_assoc($query);
    
    // 3. Verifikasi Password (cocokkan inputan dengan hash di database)
    if(password_verify($password, $data['password'])){
        
        // Jika password cocok, buat session
        $_SESSION['username']   = $username;
        $_SESSION['role']       = $data['role'];
        $_SESSION['id_anggota'] = $data['id_anggota']; 
        $_SESSION['status']     = "login";
        
        header("location: ../index.php"); 
        exit;
        
    } else {
        // Jika password salah
        header("location: ../index.php?page=login&pesan=gagal");
        exit;
    }
} else {
    // Jika username tidak ditemukan sama sekali
    header("location: ../index.php?page=login&pesan=gagal");
    exit;
}
?>