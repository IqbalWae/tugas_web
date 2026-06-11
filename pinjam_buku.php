<?php
include_once 'koneksi.php';
//include ('pinjam_buku.php');

// Proses ketika form disubmit
if (isset($_POST['proses_pinjam'])) {
    $id_anggota   = $_POST['id_anggota'];
    $id_buku      = $_POST['id_buku'];
    $tgl_pinjam   = $_POST['tgl_pinjam'];
    $tgl_kembali  = $_POST['tgl_kembali'];

    // 1. Simpan data ke tabel peminjaman
    $query_pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman (id_anggota, id_buku, tgl_pinjam, tgl_kembali) 
                    VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali')");

    // 2. Update status buku menjadi 'sedang dipinjam'
    $query_buku   = mysqli_query($koneksi, "UPDATE buku SET status = 'sedang dipinjam' WHERE id_buku = '$id_buku'");

    if ($query_pinjam && $query_buku) {
        echo "<div style='color: green; font-weight: bold; margin-bottom: 15px;'>Buku berhasil dipinjam! Status buku telah diperbarui.</div>";
    } else {
        echo "<div style='color: red; font-weight: bold; margin-bottom: 15px;'>Gagal memproses peminjaman.</div>";
    }
}
?>

<h2>Form Peminjaman Buku</h2>
<form action="" method="POST">
    <label>Pilih Anggota:</label><br>
    <select name="id_anggota" required style="width: 300px; padding: 5px;">
        <option value="">-- Pilih Anggota --</option>
        <?php
        $tampil_anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
        while ($agt = mysqli_fetch_array($tampil_anggota)) {
            echo "<option value='".$agt['id_anggota']."'>".$agt['nama']." (".$agt['no_induk'].")</option>";
        }
        ?>
    </select>
    <br><br>

    <label>Pilih Buku (Hanya yang tersedia):</label><br>
    <select name="id_buku" required style="width: 300px; padding: 5px;">
        <option value="">-- Pilih Buku --</option>
        <?php
        // Hanya mengambil buku yang statusnya 'tersedia'
        $tampil_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE status = 'tersedia'");
        while ($bk = mysqli_fetch_array($tampil_buku)) {
            echo "<option value='".$bk['id_buku']."'>".$bk['judul']."</option>";
        }
        ?>
    </select>
    <br><br>

    <label>Tanggal Pinjam:</label><br>
    <input type="date" name="tgl_pinjam" required style="padding: 5px;"><br><br>

    <label>Tanggal Kembali:</label><br>
    <input type="date" name="tgl_kembali" required style="padding: 5px;"><br><br>

    <input type="submit" name="proses_pinjam" value="Konfirmasi Pinjam Buku" style="padding: 8px 15px; cursor: pointer;">
</form>