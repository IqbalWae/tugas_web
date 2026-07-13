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

// ==========================================
// CEK APAKAH USERNAME SUDAH TERPAKAI
// ==========================================
$cek_username = mysqli_query($koneksi, "SELECT * FROM anggota WHERE username='$username'");

// Jika jumlah baris lebih dari 0, berarti username sudah ada di database
if(mysqli_num_rows($cek_username) > 0) {
    // Lempar kembali ke halaman register dengan pesan error khusus
    header("location:../index.php?page=register&pesan=username_terpakai");
    exit; // Hentikan script agar data di bawahnya tidak dieksekusi
}

// ==========================================
// PROSES HASHING PASSWORD & SIMPAN DATA
// ==========================================
// Jika username aman (belum ada), jalankan hashing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Masukkan data ke database
$query = mysqli_query($koneksi, "INSERT INTO anggota (no_induk, nama, alamat, no_telp, username, password) 
                                 VALUES ('$no_induk', '$nama', '$alamat', '$no_telp', '$username', '$hashed_password')");

if($query){
    header("location:../index.php?page=login&pesan=daftar_sukses");
} else {
    header("location:../index.php?page=register&pesan=gagal");
}
?>