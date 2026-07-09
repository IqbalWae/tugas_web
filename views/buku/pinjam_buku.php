<?php
// Menangkap pesan sukses/gagal dari Controller
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sukses') {
        echo "<div style='background-color: #d1fae5; color: #047857; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Buku berhasil dipinjam!</div>";
    } else if ($_GET['status'] == 'gagal') {
        echo "<div style='background-color: #fee2e2; color: #b91c1c; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Gagal memproses peminjaman.</div>";
    }
}
?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="margin-bottom: 24px;">Form Peminjaman Buku</h2>
    
    <form action="controllers/proses_pinjam.php" method="POST">
        <div class="form-group">
            <label>Pilih Anggota</label>
            <select name="id_anggota" required>
                <option value="">-- Pilih Anggota --</option>
                <?php
                // (Untuk sekadar menampilkan data ke dalam select, query SELECT masih diperbolehkan di View pada arsitektur PHP dasar)
                $tampil_anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
                while ($agt = mysqli_fetch_array($tampil_anggota)) {
                    echo "<option value='".$agt['id_anggota']."'>".$agt['nama']." (".$agt['no_induk'].")</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Pilih Buku (Hanya yang tersedia)</label>
            <select name="id_buku" required>
                <option value="">-- Pilih Buku --</option>
                <?php
                $tampil_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE status = 'tersedia'");
                while ($bk = mysqli_fetch_array($tampil_buku)) {
                    echo "<option value='".$bk['id_buku']."'>".$bk['judul']."</option>";
                }
                ?>
            </select>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" required>
            </div>
            <div class="form-group">
                <label>Batas Kembali</label>
                <input type="date" name="tgl_kembali" required>
            </div>
        </div>

        <input type="submit" name="proses_pinjam" value="Konfirmasi Pinjam Buku" class="btn btn-primary" style="width: 100%; margin-top: 8px;">
    </form>
</div>