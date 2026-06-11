<?php
include_once 'koneksi.php';

// Proses ketika tombol 'Kembalikan Buku' diklik
if (isset($_POST['proses_kembali'])) {
    $id_pinjam = $_POST['id_pinjam'];
    $id_buku   = $_POST['id_buku'];

    // 1. Hapus data transaksi dari tabel peminjaman
    $query_hapus_pinjam = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_pinjam = '$id_pinjam'");

    // 2. Ubah status buku kembali menjadi 'tersedia'
    $query_update_buku  = mysqli_query($koneksi, "UPDATE buku SET status = 'tersedia' WHERE id_buku = '$id_buku'");

    if ($query_hapus_pinjam && $query_update_buku) {
        echo "<div style='color: green; font-weight: bold; margin-bottom: 15px;'>Buku sukses dikembalikan! Status buku kini 'Tersedia'.</div>";
    } else {
        echo "<div style='color: red; font-weight: bold; margin-bottom: 15px;'>Gagal memproses pengembalian buku.</div>";
    }
}
?>

<h2>Daftar Buku yang Sedang Dipinjam</h2>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr style="background-color: #f2f2f2;">
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Batas Kembali</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    // Query JOIN untuk mengambil data peminjaman, nama anggota, dan judul buku secara bersamaan
    $sql = "SELECT peminjaman.id_pinjam, peminjaman.id_buku, anggota.nama, buku.judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali 
            FROM peminjaman 
            JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
            JOIN buku ON peminjaman.id_buku = buku.id_buku";
            
    $query = mysqli_query($koneksi, $sql);

    // Cek jika tidak ada buku yang sedang dipinjam
    if (mysqli_num_rows($query) == 0) {
        echo "<tr><td colspan='6' style='text-align:center; color: #777;'>Saat ini tidak ada buku yang sedang dipinjam.</td></tr>";
    }

    while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo date('d-m-Y', strtotime($data['tgl_pinjam'])); ?></td>
            <td><?php echo date('d-m-Y', strtotime($data['tgl_kembali'])); ?></td>
            <td>
                <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin buku ini sudah dikembalikan?');">
                    <input type="hidden" name="id_pinjam" value="<?php echo $data['id_pinjam']; ?>">
                    <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
                    <input type="submit" name="proses_kembali" value="Kembalikan Buku" style="background-color: #2196F3; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px;">
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>