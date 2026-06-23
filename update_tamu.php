<?php
include "koneksi.php"; // Menggunakan koneksi perpustakaan

$id = $_GET['id'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$pesan = $_GET['pesan'];

$update = "UPDATE tamu SET nama='$nama', email='$email', pesan='$pesan' WHERE id_tamu='$id'";
$hasil = mysqli_query($koneksi, $update);

if ($hasil){
    header("location:index.php?page=tampil_tamu_table"); // Redirect disesuaikan
} else {
    echo "Update data gagal";
}
?>