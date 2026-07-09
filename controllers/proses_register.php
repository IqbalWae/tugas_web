<?php
// Hubungkan ke database
include '../config/koneksi.php';

// Menangkap data yang dikirim dari form
$no_induk   = $_POST['no_induk'];
$nama       = $_POST['nama'];
$alamat     = $_POST['alamat'];
$no_telp    = $_POST['no_telp'];
$username   = $_POST['username'];
$password   = $_POST['password'];

// Query untuk memasukkan data ke tabel anggota
// Role tidak perlu diinput karena otomatis 'user' berkat pengaturan Default di database
$query = mysqli_query($koneksi, "INSERT INTO anggota (no_induk, nama, alamat, no_telp, username, password) 
                                 VALUES ('$no_induk', '$nama', '$alamat', '$no_telp', '$username', '$password')");

// Cek apakah query berhasil
if($query){
    // Jika berhasil, arahkan ke halaman login dengan pesan sukses
    header("location:../views/login.php?pesan=daftar_sukses");
} else {
    // Jika gagal, kembalikan ke halaman daftar
    header("location:../views/register.php?pesan=gagal");
}
?>