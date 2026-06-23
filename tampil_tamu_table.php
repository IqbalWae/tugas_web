<h2>Data Tamu</h2>

<?php
include_once 'koneksi.php';

$tampil = 'SELECT * FROM tamu ORDER BY id_tamu';
$hasil = mysqli_query($koneksi, $tampil);

echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%;'> 
    <tr>
        <th bgcolor='lightblue'> Nama </th>
        <th bgcolor='lightblue'> Email </th>
        <th bgcolor='lightblue'> Pesan </th>
        <th bgcolor='lightblue'> Action </th>
    </tr>";
    
while ($data = mysqli_fetch_array($hasil)){
    echo "<tr>
            <td>$data[nama]</td>
            <td>$data[email]</td>
            <td>$data[pesan]</td>
            <td>
                <a href='index.php?page=edit_tamu&id=$data[id_tamu]'>Edit</a> | 
                <a href='hapus_tamu.php?id=$data[id_tamu]' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
            </td>
        </tr>"; 
}
echo "</table>";
?>