<?php  ?>

<div class="card">
    <h2 style="margin-bottom: 24px;">Dasbor Perpustakaan</h2>

    <?php
    $tot_buku = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku"))['total'];
    $tot_pinjam = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM buku WHERE status = 'dipinjam'"))['total'];
    $tot_anggota = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM anggota"))['total'];
    ?>

    <div class="grid-3">
        <div class="stat-card">
            <div class="title">Total Koleksi Buku</div>
            <div class="value"><?php echo $tot_buku; ?></div>
        </div>
        
        <div class="stat-card">
            <div class="title">Buku Dipinjam</div>
            <div class="value" style="color: var(--primary);"><?php echo $tot_pinjam; ?></div>
        </div>
        
        <div class="stat-card">
            <div class="title">Anggota Terdaftar</div>
            <div class="value"><?php echo $tot_anggota; ?></div>
        </div>
    </div><br>
</div>
    <div class="card"
    <h3> Jelajahi Perpustakaan dan Bacalah Buku yang Ada</h3>
    <a></a>
</div>