<?php
//memanggil koneksi.php agar tersambung ke database
require_once 'config/koneksi.php';
// Memanggil bagian header
require_once 'views/layout/header.php';

// Menangkap parameter 'page' dari URL. Default-nya adalah 'profil'
$page = isset($_GET['page']) ? $_GET['page'] : 'profil';

// Logika include() berdasarkan menu yang dipilih
switch ($page) {
    case 'profil':
        include 'views/profil.php';
        break;
    case 'visi_misi':
        include 'views/visi_misi.php';
        break;
        
    case 'daftar_buku':
        include 'views/buku/daftar_buku.php';
        break;
    case 'detail_buku': // Tambahkan baris ini
        include 'views/buku/detail_buku.php';
        break;
    case 'pinjam_buku':
        include 'views/buku/pinjam_buku.php';
        break;
    case 'pengembalian_buku':
        include 'views/buku/pengembalian_buku.php';
        break;
    case 'tambah_buku':
        include 'views/buku/tambah_buku.php';
        break;
       

    case 'buku_tamu':
        // Kita panggil form_tamu.php saat menu Buku Tamu diklik
        include 'views/tamu/form_tamu.php'; 
        break;
    case 'tampil_tamu_table':
        // Menampilkan tabel data
        include 'views/tamu/tampil_tamu_table.php';
        break;
    case 'edit_tamu':
        // Menampilkan halaman edit
        include 'views/tamu/edit_tamu.php';
        break;
    case 'logout': // Tambahkan ini
        include 'controllers/logout.php';
        break;

    // ... default case ...
    default:
        echo "<h3>Maaf, halaman tidak ditemukan!</h3>";
        break;
}

// Memanggil bagian footer
include 'views/layout/footer.php';
?>