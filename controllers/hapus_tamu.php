<?php

require_once "../config/koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM tamu WHERE id_tamu='$id'";

if(mysqli_query($koneksi, $sql)){

    header("Location: ../index.php?page=tampil_tamu_table");
    exit;

}else{

    die(mysqli_error($koneksi));

}

// include "../config/koneksi.php"; // Menggunakan koneksi perpustakaan

// $id = $_GET['id'];

// $hapus = "DELETE FROM tamu WHERE id_tamu = '$id'";
// $hasil = mysqli_query($koneksi, $hapus);

// if ($hasil){
//     header("location:index.php?page=tampil_tamu_table"); // Redirect disesuaikan
// } else {
//     echo "Data Gagal dihapus"; // Pesan else diperbaiki (sebelumnya tertulis 'berhasil dihapus' padahal masuk ke blok gagal)
// }

?>