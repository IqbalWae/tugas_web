<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>
    <link rel="stylesheet" href="aset/style.css">
    <link rel="icon" type="image/png" href="aset/images/logo.png">
</head>
<body>

<nav class="top-nav">
        <div class="nav-left">
            <div class="logo-wrapper"> 
                <img src="aset/images/Logo.png" alt="Logo" width="50">
            </div>
        </div>

        <div class="nav-center">
            <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "login" && $_SESSION['role'] == "admin"): ?>
                <a href="index.php?page=profil" class="menu-link">Profil</a>
                <a href="index.php?page=daftar_buku" class="menu-link">Daftar Buku</a>
                <a href="index.php?page=pinjam_buku" class="menu-link">Pinjam Buku</a>
                <a href="index.php?page=pengembalian_buku" class="menu-link">Pengembalian Buku</a>
                <a href="index.php?page=tambah_buku" class="menu-link">Tambah Buku</a>
                <a href="index.php?page=tampil_tamu_table" class="menu-link">Menu Admin</a>
                
            <?php elseif (isset($_SESSION['status']) && $_SESSION['status'] == "login" && $_SESSION['role'] == "user"): ?>
                <a href="index.php?page=profil" class="menu-link">Profil</a>
                <a href="index.php?page=daftar_buku" class="menu-link">Daftar Buku</a>
                <a href="index.php?page=pinjam_buku" class="menu-link">Pinjam Buku</a>
                <a href="index.php?page=pengembalian_buku" class="menu-link">Pengembalian Buku</a>
                
            <?php else: ?>
                <a href="index.php?page=profil" class="menu-link">Profil</a>
                <a href="index.php?page=daftar_buku" class="menu-link">Daftar Buku</a>
                
            <?php endif; ?>
        </div>

        <div class="nav-right">
            <a href="index.php?page=buku_tamu" class="btn btn-primary">Isi Buku Tamu</a>
            
            <?php if(isset($_SESSION['status']) && $_SESSION['status'] == "login"): ?>
                <a href="index.php?page=logout" class="btn-auth btn-logout">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>
            <?php else: ?>
                <a href="index.php?page=login" class="btn-auth">Log in</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">