<?php
// Mundur satu folder untuk memanggil koneksi
include_once '../config/koneksi.php';

if (isset($_POST['proses_kembali'])) {
    $id_pinjam = $_POST['id_pinjam'];
    $id_buku   = $_POST['id_buku'];

    $query_hapus = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam'");
    $query_update = mysqli_query($koneksi, "UPDATE buku SET status = 'tersedia' WHERE id_buku = '$id_buku'");

    if ($query_hapus && $query_update) {
        header("location: ../index.php?page=pengembalian_buku&status=sukses");
    } else {
        header("location: ../index.php?page=pengembalian_buku&status=gagal");
    }
}
?>