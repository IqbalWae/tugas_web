<?php

require_once "../config/koneksi.php";

// session_start();

// if($_SESSION['status'] != "login"){
//     header("Location: ../index.php?pesan=belum_login");
//     exit; // Hentikan eksekusi script ke bawah
// }

if (isset($_POST['proses_pinjam'])) {

    $id_anggota  = $_POST['id_anggota'];
    $id_buku     = $_POST['id_buku'];
    $tgl_pinjam  = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    $pinjam = mysqli_query(
        $koneksi,
        "INSERT INTO peminjaman
        (id_anggota,id_buku,tgl_pinjam,tgl_kembali)
        VALUES
        ('$id_anggota','$id_buku','$tgl_pinjam','$tgl_kembali')"
    );

    $status = mysqli_query(
        $koneksi,
        "UPDATE buku
        SET status='dipinjam' 
        WHERE id_buku='$id_buku'"
    );

    if ($pinjam && $status) {

        header("Location: ../index.php?page=pinjam_buku&status=sukses");
        exit;

    }   

    header("Location: ../index.php?page=pinjam_buku&status=gagal");
    exit;
}