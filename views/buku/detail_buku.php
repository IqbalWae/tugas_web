<?php


// Menangkap ID buku dari URL
$id_buku = isset($_GET['id']) ? $_GET['id'] : '';

// Mengambil data spesifik berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
$data = mysqli_fetch_array($query);

// Jika buku tidak ditemukan, tampilkan pesan error
if (!$data) {
    echo "<div style='background-color: #fee2e2; color: #b91c1c; padding: 16px; border-radius: var(--radius-md); font-weight: 500;'>Buku tidak ditemukan!</div>";
    exit;
}

$status_class = ($data['status'] == 'tersedia') ? 'badge-success' : 'badge-error';
?>

<div style="margin-bottom: 24px; font-size: 14px; font-weight: 500;">
    <a href="index.php?page=daftar_buku" style="color: var(--text-muted);">Koleksi Buku</a>
    <span style="margin: 0 8px; color: var(--text-muted);">/</span>
    <span style="color: var(--ink);">Detail Buku</span>
</div>

<div class="card" style="display: flex; flex-wrap: wrap; padding: 0; overflow: hidden;">
    
    <div style="flex: 1 1 250px; background-color: var(--surface); display: flex; align-items: center; justify-content: center; border-right: 1px solid var(--hairline); min-height: 300px;">
        <svg width="100" height="100" fill="none" stroke="#d1d5db" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
        </svg>
    </div>
    
    <div style="flex: 2 1 400px; padding: 32px; display: flex; flex-direction: column;">
        
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
            <h2 style="margin: 0; font-size: 28px; line-height: 1.2; padding-right: 16px;"><?php echo $data['judul']; ?></h2>
            <span class="badge <?php echo $status_class; ?>"><?php echo $data['status']; ?></span>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px; padding-bottom: 24px; border-bottom: 1px solid var(--hairline);">
            <div>
                <div style="font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">Pengarang</div>
                <div style="font-size: 16px; font-weight: 500;"><?php echo $data['pengarang']; ?></div>
            </div>
            <div>
                <div style="font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">Tahun Terbit</div>
                <div style="font-size: 16px; font-weight: 500;"><?php echo $data['tahun_terbit']; ?></div>
            </div>
            <div>
                <div style="font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">ID Referensi</div>
                <div style="font-size: 16px; font-weight: 500;">BK-<?php echo str_pad($data['id_buku'], 4, '0', STR_PAD_LEFT); ?></div>
            </div>
            <div>
                <div style="font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">Kategori</div>
                <div style="font-size: 16px; font-weight: 500;"><?php echo $data['kategori']; ?></div>
            </div>
        </div>
        
        <p style="color: var(--text-muted); line-height: 1.6; font-size: 14px; margin-bottom: 32px; flex-grow: 1;">
            Buku ini merupakan bagian dari koleksi utama Perpustakaan. Pastikan untuk selalu menjaga kondisi buku dengan baik selama masa peminjaman.
        </p>
        
        <div style="display: flex; gap: 12px; margin-top: auto;">
            <a href="index.php?page=daftar_buku" class="btn" style="background-color: var(--canvas); color: var(--ink); border: 1px solid var(--hairline);">Kembali</a>
            
            <?php if ($data['status'] == 'tersedia') { ?>
                <!-- <a href="index.php?page=pinjam_buku" class="btn btn-primary">Pinjam Buku Ini</a> -->
                 <a href="index.php?page=pinjam_buku&id=<?php echo $data['id_buku']; ?>"
                    class="btn btn-primary">
                        Pinjam Buku Ini
</a>
            <?php } else { ?>
                <button class="btn" style="background-color: var(--surface); color: var(--text-muted); border: 1px solid var(--hairline); cursor: not-allowed;" disabled>Sedang Dipinjam</button>
            <?php } ?>
        </div>
        
    </div>
</div>