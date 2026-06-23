<?php
include "koneksi.php"; // Menggunakan koneksi perpustakaan

$id = $_GET['id'];

$hapus = "DELETE FROM tamu WHERE id_tamu = '$id'";
$hasil = mysqli_query($koneksi, $hapus);

if ($hasil){
    header("location:index.php?page=tampil_tamu_table"); // Redirect disesuaikan
} else {
    echo "Data Gagal dihapus"; // Pesan else diperbaiki (sebelumnya tertulis 'berhasil dihapus' padahal masuk ke blok gagal)
}
?>