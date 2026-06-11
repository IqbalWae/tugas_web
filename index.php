<?php
//memanggil koneksi.php agar tersambung ke database
include 'koneksi.php';
// Memanggil bagian header
include 'header.php';

// Menangkap parameter 'page' dari URL. Default-nya adalah 'profil'
$page = isset($_GET['page']) ? $_GET['page'] : 'profil';

// Logika include() berdasarkan menu yang dipilih
switch ($page) {
    case 'profil':
        include 'profil.php';
        break;
    case 'visi_misi':
        include 'visi_misi.php';
        break;
    case 'daftar_buku':
        include 'daftar_buku.php';
        break;
    case 'pinjam_buku':
        include 'pinjam_buku.php';
        break;
    case 'pengembalian_buku':
        include 'pengembalian_buku.php';
        break;
    case 'buku_tamu':
        include 'buku_tamu.php';
        break;
    default:
        echo "<h3>Maaf, halaman tidak ditemukan!</h3>";
        break;
}

// Memanggil bagian footer
include 'footer.php';
?>