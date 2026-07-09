<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("Location: index.php?page=login&pesan=belum_login"); 
    exit;
}

// Menangkap berbagai macam pesan dari Controller
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sukses') {
        echo "<div style='background-color: #d1fae5; color: #047857; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Buku berhasil dipinjam!</div>";
    } else if ($_GET['status'] == 'gagal') {
        echo "<div style='background-color: #fee2e2; color: #b91c1c; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Gagal memproses peminjaman.</div>";
    } else if ($_GET['status'] == 'error_tanggal') {
        // Pesan error baru jika tanggalnya tidak masuk akal
        echo "<div style='background-color: #fef3c7; color: #b45309; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Gagal! Batas kembali tidak boleh sebelum tanggal pinjam.</div>";
    }
}
?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="margin-bottom: 24px;">Form Peminjaman Buku</h2>
    
    <form action="controllers/proses_pinjam.php" method="POST">
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
                <input type="date" id="input_tgl_pinjam" name="tgl_pinjam" required>
            </div>
            <div class="form-group">
                <label>Batas Kembali</label>
                <input type="date" id="input_tgl_kembali" name="tgl_kembali" required>
            </div>
        </div>

        <input type="submit" name="proses_pinjam" value="Konfirmasi Pinjam Buku" class="btn btn-primary" style="width: 100%; margin-top: 16px;">
    </form>
</div>

<script>
    const tglPinjam = document.getElementById('input_tgl_pinjam');
    const tglKembali = document.getElementById('input_tgl_kembali');

    // Setiap kali user mengubah tanggal pinjam
    tglPinjam.addEventListener('change', function() {
        // Ubah batas minimal (min) pada kalender batas kembali 
        tglKembali.min = this.value;
        
        // Jika user sebelumnya sudah mengisi batas kembali dengan tanggal yang salah, reset!
        if(tglKembali.value && tglKembali.value < this.value) {
            tglKembali.value = this.value; 
        }
    });
</script>