<?php
include_once 'koneksi.php';
?>
<h2>Daftar Koleksi Buku Perpustakaan</h2>

<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <tr style="background-color: #f2f2f2;">
        <th>No</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Status</th>
    </tr>

    <?php
    $no = 1;
    // Mengambil data dari tabel buku
    $query = mysqli_query($koneksi, "SELECT * FROM buku");

    // Menampilkan data dengan perulangan (while loop)
    while ($data = mysqli_fetch_array($query)) {
        // Logika pewarnaan status
        $status = $data['status'];
        $warna  = ($status == 'tersedia') ? 'green' : 'red';
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['pengarang']; ?></td>
            <td><?php echo $data['tahun_terbit']; ?></td>
            <td style="color: <?php echo $warna; ?>; font-weight: bold;">
                <?php echo ucwords($status); ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>