<?php
// Mengaktifkan session PHP
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Menghubungkan ke database (Sesuaikan path jika berbeda)
require_once '../config/koneksi.php';

// Menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Mengambil data dari tabel anggota berdasarkan username dan password
$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username' AND password='$password'");

// Menghitung jumlah baris data yang ditemukan
$cek = mysqli_num_rows($query);

if($cek > 0){
    // Jika data ditemukan, ambil detail datanya
    $data = mysqli_fetch_assoc($query);
    
    // Simpan ke dalam session
    $_SESSION['username']   = $username;
    $_SESSION['role']       = $data['role'];
    $_SESSION['status']     = "login";
    
    // SANGAT PENTING: Simpan id_anggota agar nanti mudah saat proses insert ke tabel peminjaman
    $_SESSION['id_anggota'] = $data['id_anggota']; 

    // Arahkan kembali ke halaman utama (Sesuaikan path index.php kamu)
    // Jika index.php ada di luar folder 'aset', gunakan header("location:../../index.php");
    header("location:../../index.php"); 
    
} else {
    // Jika data tidak ditemukan, kembalikan ke form login dengan parameter pesan=gagal
    header("location:../index.php?page=login&pesan=gagal");
}
?>