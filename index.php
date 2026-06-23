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
        // ... case lain seperti profil, visi_misi, dll ...

    case 'buku_tamu':
        // Kita panggil form_tamu.php saat menu Buku Tamu diklik
        include 'form_tamu.php'; 
        break;
    case 'tampil_tamu_table':
        // Menampilkan tabel data
        include 'tampil_tamu_table.php';
        break;
    case 'edit_tamu':
        // Menampilkan halaman edit
        include 'edit_tamu.php';
        break;

    // ... default case ...
    default:
        echo "<h3>Maaf, halaman tidak ditemukan!</h3>";
        break;
}

// Memanggil bagian footer
include 'footer.php';
?>