<?php
// Menangkap pesan sukses dari Controller
if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
    echo "<div style='background-color: #d1fae5; color: #047857; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Buku sukses dikembalikan ke rak!</div>";
} else if (isset($_GET['status']) && $_GET['status'] == 'gagal') {
    echo "<div style='background-color: #fee2e2; color: #b91c1c; padding: 16px; border-radius: 8px; margin-bottom: 24px; font-weight: 500;'>Gagal memproses pengembalian.</div>";
}
?>

<div class="card">
    <h2 style="margin-bottom: 24px;">Pengembalian Buku</h2>

    <?php
    $sql = "SELECT peminjaman.id_pinjam, peminjaman.id_buku, anggota.nama, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali 
            FROM peminjaman JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota JOIN buku ON peminjaman.id_buku = buku.id_buku";
    $query = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($query) == 0) {
    ?>
        <div class="empty-state">
            <h3>Semua Buku Telah Kembali</h3>
            <p>Saat ini tidak ada buku yang sedang dipinjam oleh anggota. Antrean sirkulasi dalam keadaan kosong.</p>
            <a href="index.php?page=pinjam_buku" class="btn btn-primary">Buat Peminjaman Baru</a>
        </div>
    <?php } else { ?>
        <table>
            <thead>
                <tr>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Batas Kembali</th>
                    <th style="text-align: right;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td style="font-weight: 500;"><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo date('d M Y', strtotime($data['tgl_pinjam'])); ?></td>
                        <td style="color: #b91c1c; font-weight: 500;"><?php echo date('d M Y', strtotime($data['tgl_kembali'])); ?></td>
                        <td style="text-align: right;">
                            <form action="controllers/proses_kembali.php" method="POST" onsubmit="return confirm('Proses pengembalian buku ini?');" style="margin: 0;">
                                <input type="hidden" name="id_pinjam" value="<?php echo $data['id_pinjam']; ?>">
                                <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
                                <button type="submit" name="proses_kembali" class="btn btn-primary" style="padding: 6px 12px; font-size: 13px;">Kembalikan</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</div>  