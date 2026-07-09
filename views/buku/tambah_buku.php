<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['status']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php?page=daftar_buku"); 
    exit;
}

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sukses') {
        echo "<div style='background-color: #d1fae5; color: #047857; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Buku baru berhasil ditambahkan!</div>";
    } else if ($_GET['status'] == 'gagal') {
        echo "<div style='background-color: #fee2e2; color: #b91c1c; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Gagal menambahkan buku. Periksa kembali data Anda.</div>";
    }
}
?>

<div class="card" style="max-width: 700px; margin: 0 auto;">
    <h2 style="margin-bottom: 8px;">Tambah Buku Baru</h2>
    <p style="color: var(--text-muted); margin-bottom: 24px;">Masukkan informasi detail mengenai buku baru ke dalam katalog perpustakaan.</p>
    
    <form action="controllers/proses_tambah_buku.php" method="POST">
        
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" placeholder="Masukkan judul buku" required autocomplete="off">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" id="pengarang" name="pengarang" placeholder="Nama penulis" required>
            </div>
            
            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" id="penerbit" name="penerbit" placeholder="Nama penerbit" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" id="tahun_terbit" name="tahun_terbit" min="1900" max="2099" placeholder="YYYY" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" placeholder="Contoh: Novel, Komputer, Sejarah" required>
            </div>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 24px;">
            <input type="submit" name="simpan_buku" value="Simpan Buku" class="btn btn-primary" style="flex: 1;">
            <a href="index.php?page=daftar_buku" class="btn" style="flex: 1; text-align: center; text-decoration: none; border: 1px solid var(--hairline); color: var(--ink);">Batal</a>
        </div>

    </form>
</div>