<?php
session_start();
require_once "../config/koneksi.php";

if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php"); 
    exit;
}

if (isset($_POST['simpan_buku'])) {
    
    // Menangkap data dari form yang baru
    $judul       = $_POST['judul'];
    $pengarang   = $_POST['pengarang'];
    $penerbit    = $_POST['penerbit'];
    $tahun       = $_POST['tahun_terbit'];
    $kategori    = $_POST['kategori'];
    
    // Status otomatis diset ke 'tersedia'
    $status      = 'tersedia';

    // Query insert (TANPA kode_buku dan TANPA jumlah)
    $query = mysqli_query($koneksi, 
        "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori, status) 
         VALUES ('$judul', '$pengarang', '$penerbit', '$tahun', '$kategori', '$status')"
    );

    if ($query) {
        header("Location: ../index.php?page=tambah_buku&status=sukses");
        exit;
    } else {
        header("Location: ../index.php?page=tambah_buku&status=gagal");
        exit;
    }
} else {
    header("Location: ../index.php?page=tambah_buku");
    exit;
}
?>