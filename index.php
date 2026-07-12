<?php
//memanggil koneksi.php agar tersambung ke database
require_once 'config/koneksi.php';
// Memanggil bagian header
// require_once 'views/layout/header.php';

// 1. TANGKAP PARAMETER PAGE LEBIH DULU
// Pindahkan baris ini ke atas sebelum memanggil header
$page = isset($_GET['page']) ? $_GET['page'] : 'profil';

// 2. LOGIKA PENAMPILAN HEADER
// Jika halaman BUKAN login dan BUKAN register, maka tampilkan header
if ($page != 'login' && $page != 'register') {
    require_once 'views/layout/header.php';
} else {
    // Jika halaman login/register, berikan kerangka HTML dasar saja tanpa menu navigasi
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistem Informasi Perpustakaan</title>
        <link rel="stylesheet" href="aset/style.css">
        <link rel="icon" type="image/png" href="../aset/images/logo.png">
    </head>
    <body>
    <?php
}
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

    case 'login':
        include 'views/login.php';
        break;
    case 'register':
        include 'views/register.php';
        break;
    case 'logout': // Tambahkan ini
        include 'controllers/logout.php';
        break;

    // ... default case ...
    default:
        echo "<h3>Maaf, halaman tidak ditemukan!</h3>";
        break;
}
// 4. LOGIKA PENAMPILAN FOOTER (Jika kamu punya file footer)
if ($page != 'login' && $page != 'register') {
    include 'views/layout/footer.php';
    // Jika sebelumnya ada pemanggilan footer.php, letakkan di dalam if ini
    // require_once 'views/layout/footer.php'; 
} else {
    // Tutup tag HTML untuk halaman login/register
    ?>
    </body>
    </html>
    <?php
}
?>