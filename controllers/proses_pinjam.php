<?php
require_once "../config/koneksi.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if($_SESSION['status'] != "login"){
    header("Location: ../index.php?pesan=belum_login");
    exit;
}

if (isset($_POST['proses_pinjam'])) {

    // Ambil ID anggota dari session yang sedang login
    $id_anggota  = $_SESSION['id_anggota']; 
    $id_buku     = $_POST['id_buku'];
    $tgl_pinjam  = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    // ==========================================
    // LOGIKA VALIDASI TANGGAL (BUG FIX)
    // ==========================================
    if (strtotime($tgl_kembali) < strtotime($tgl_pinjam)) {
        // Lempar kembali ke halaman form dengan pesan error khusus
        header("Location: ../index.php?page=pinjam_buku&status=error_tanggal");
        exit;
    }

    // Jika validasi aman, lanjutkan proses insert
    $pinjam = mysqli_query(
        $koneksi,
        "INSERT INTO peminjaman (id_anggota, id_buku, tgl_pinjam, tgl_kembali)
        VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali')"
    );

    $status = mysqli_query(
        $koneksi,
        "UPDATE buku SET status='dipinjam' WHERE id_buku='$id_buku'"
    );

    if ($pinjam && $status) {
        header("Location: ../index.php?page=pinjam_buku&status=sukses");
        exit;
    }   

    header("Location: ../index.php?page=pinjam_buku&status=gagal");
    exit;
}
?>